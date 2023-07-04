<?php
session_start();

require 'pdo-connection.php';
    
try {
    $prepareUser = $pdoQuizz->prepare("SELECT * FROM users ORDER BY best_score DESC");
    $prepareUser->execute();
    $fetchedUser = $prepareUser->fetchAll();
} catch (PDOException $exception) {
    $_SESSION['lastErrMsg'] = $exception->getMessage();
    header('Location: ../leaderboard.php?err=fetchBestScoreFailed');
    exit();
}

foreach ($fetchedUser as $user) {
    echo "<ul>";
    echo "<li>User: " . htmlspecialchars($user['username']) . " Best Score: " . htmlspecialchars($user['best_score']) . "</li>";
    echo "</ul>";
}
