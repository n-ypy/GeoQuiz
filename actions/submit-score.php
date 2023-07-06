<?php

session_start();

$data = json_decode(file_get_contents('php://input'), true);
$score = $data['score'];
$userLoggedIn = verifyIfUserLoggedIn();
$newBestScore = verifyIfNewBestScore($score, $userLoggedIn);

function verifyIfUserLoggedIn()
{
    if (isset($_SESSION["id"]) && isset($_SESSION["username"]) && (isset($_SESSION["best_score"]) || $_SESSION["best_score"] === null)) {
        return true;
    } else {
        return false;
    }
}

function verifyIfNewBestScore($score, bool $userLoggedIn = false)
{
    if ($userLoggedIn) {
        if ($_SESSION["best_score"] < $score || $_SESSION["best_score"] === null) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function submitNewBestScore($score, bool $newBestScore = false, bool $userLoggedIn = false)
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

submitNewBestScore($score, $newBestScore, $userLoggedIn);
