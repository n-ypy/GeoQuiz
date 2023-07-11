<?php
session_set_cookie_params(time() + 86400 * 365, "/", true, true);
session_start();


$username = strtolower($_POST['username']);
$username = htmlspecialchars($username);


function verifyUsernameAndLogin(string $username)
{
    require 'pdo-connection.php';
    
    try {
        $prepareUser = $pdoQuizz->prepare("SELECT * FROM users WHERE username = :username");
        $prepareUser->execute([':username' => $username]);
        $fetchedUser = $prepareUser->fetch();
    } catch (PDOException $exception) {
        $_SESSION['lastErrMsg'] = $exception->getMessage();
        header('Location: ../index.php?err=fetchForVerificationFailed');
        exit();
    }

    if ($fetchedUser) {
        login($fetchedUser);
    } else {
        $fetchedUser = addUserAndFetchUserInfos($username);
        login($fetchedUser);
    }
}


function addUserAndFetchUserInfos($username)
{
    require 'pdo-connection.php';
    
    try {
        $prepareUser = $pdoQuizz->prepare("INSERT INTO users (username) VALUES (:username)");
        $prepareUser->execute([':username' => $username]);
    } catch (PDOException $exception) {
        $_SESSION['lastErrMsg'] = $exception->getMessage();
        header('Location: ../index.php?err=insertUsernameFailed');
        exit();
    }
    
    try {
        $prepareUser = $pdoQuizz->prepare("SELECT * FROM users WHERE username = :username");
        $prepareUser->execute([':username' => $username]);
        $fetchedUser = $prepareUser->fetch();
    } catch (PDOException $exception) {
        $_SESSION['lastErrMsg'] = $exception->getMessage();
        header('Location: ../index.php?err=addUserFailed');
        exit();
    }
    
    return $fetchedUser;
}


function login(array $fetchedUser)
{
    $_SESSION["username"] = $_POST['username'];
    $_SESSION["id"] = $fetchedUser["id"];
    $_SESSION["best_score"] = $fetchedUser["best_score"];
    header('Location: ../index.php');
    exit();
}


verifyUsernameAndLogin($username);