<?php
require 'pdo-connection.php';

try {
    $prepareUser = $pdoQuizz->prepare("SELECT * FROM users ORDER BY best_score DESC LIMIT 5");
    $prepareUser->execute();
    $fetchedUser = $prepareUser->fetchAll();
} catch (PDOException $exception) {
    $_SESSION['lastErrMsg'] = $exception->getMessage();
    header('Location: ../leaderboard.php?err=fetchBestScoreFailed');
    exit();
}


