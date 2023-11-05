<?php

$data = json_decode(file_get_contents('php://input'), true);

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
            header('Location: ../quiz.php?err=fetchQuestionsFailed');
            exit();
        }
    } else {
        exit();
    }
    return $fetchedQuestions;
}

$key = isset($data['key']);


$fetchedQuestions = getQuestions($key);
echo json_encode($fetchedQuestions);
