<?php

function getQuestions($key = false)
{
    if ($key) {
        try {
            require 'pdo-connection.php';
            $prepareQuestions = $pdoQuizz->prepare("SELECT * FROM questions");
            $prepareQuestions->execute();
            $fetchedQuestions = $prepareQuestions->fetchAll();
        } catch (PDOException $exception) {
            $_SESSION['lastErrMsg'] = $exception->getMessage();
            header('Location: ../quizz.php?err=fetchQuestionsFailed');
            exit();
        }
    } else {
        exit();
    }
    return $fetchedQuestions;
}

// $key = isset($_POST['your_key']);
$key = true;


$fetchedQuestions = getQuestions($key);
echo json_encode($fetchedQuestions, JSON_FORCE_OBJECT);
