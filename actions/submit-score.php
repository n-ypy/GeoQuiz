<?php

session_start();

$data = json_decode(file_get_contents('php://input'), true);
$score = (int) $data['score'];
$userLoggedIn = verifyIfUserLoggedIn();
$newBestScore = verifyIfNewBestScore($userLoggedIn, $score);

function verifyIfUserLoggedIn()
{
    if (isset($_SESSION["id"]) && isset($_SESSION["username"]) && isset($_SESSION["best_score"])) {
        return true;
    } else {
        return false;
    }
}

function verifyIfNewBestScore(bool $userLoggedIn = false, int $score)
{
    if ($userLoggedIn) {
        require 'pdo-connection.php';
        try {
            $prepareSubmitScore = $pdoQuizz->prepare("SELECT * FROM users WHERE id = :id");
            $prepareSubmitScore->execute([
                ':id' => $_SESSION["id"],
            ]);
            $fetchedUser = $prepareSubmitScore->fetchAll();
            if ($fetchedUser[0]['best_score'] < $score || $fetchedUser[0]['best_score'] === null) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exception) {
            $_SESSION['lastErrMsg'] = $exception->getMessage();
            header('Location: ../index.php?err=getScoreFailed');
            exit();
        }
    } else {
        return false;
    }
}

function submitNewBestScore(bool $newBestScore = false, bool $userLoggedIn = false, int $score)
{
    require 'pdo-connection.php';
    if ($newBestScore && $userLoggedIn) {
        try {
            $prepareSubmitScore = $pdoQuizz->prepare("UPDATE users SET best_score = :best_score WHERE id = :id");
            $prepareSubmitScore->execute([
                ':id' => $_SESSION["id"],
                ':best_score' => $score,
            ]);
        } catch (PDOException $exception) {
            $_SESSION['lastErrMsg'] = $exception->getMessage();
            header('Location: ../index.php?err=submitScoreFailed');
            exit();
        }
    } else {
        exit();
    }
}

submitNewBestScore($newBestScore, $userLoggedIn, $score);