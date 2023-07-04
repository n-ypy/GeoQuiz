<?php
require 'pdo-connection.php';
    
try {
    $prepareQuestions = $pdoQuizz->prepare("SELECT * FROM questions");
    $prepareQuestions->execute();
    $fetchedQuestions = $prepareQuestions->fetchAll();
} catch (PDOException $exception) {
    $_SESSION['lastErrMsg'] = $exception->getMessage();
    header('Location: ../quizz.php?err=fetchQuestionsFailed');
    exit();
}


echo json_encode($fetchedQuestions, JSON_FORCE_OBJECT);