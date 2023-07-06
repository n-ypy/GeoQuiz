<?php
require 'pdo-connection.php';

try {
    $prepareUser = $pdoQuizz->prepare("SELECT * FROM users ORDER BY best_score DESC");
    $prepareUser->execute();
    $fetchedUser = $prepareUser->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    $_SESSION['lastErrMsg'] = $exception->getMessage();
    header('Location: ../leaderboard.php?err=fetchBestScoreFailed');
    exit();
}


