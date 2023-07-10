<?php
session_start();
if (!isset($_SESSION['id']))
{
    header("Location: index.php?err=userNotLoggedIn");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>GéoQuiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<nav id="topnav">
        <input type="button" value="< Retour" onclick="history.back()">
        <input type="button" value="Se déconnecter" onclick="location.href='actions/disconnect.php'">
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 col-lg-10">
                <div class="question">
                    <div class="header">
                        <h1>GéoQuiz !</h1>
                        <span id="questionNumber"></span> <!--attention à id="questionNumber"-->
                    </div>
                </div>
                <div class="question">
                    <div class="question-title">
                        <h5 id="enunciate"></h5> <!--attention à id="enunciate"-->
                    </div>

                    <div class="buttons" id="option1"> <!--attention à id="responseOne"-->
                        <button class="btn" onclick="option1()"></button>
                    </div>
                    <br>
                    <div class="buttons" id="option2"> <!--attention à id="responseTwo"-->
                        <button class="btn" onclick="option2()"></button>
                    </div>
                    <br>
                    <div class="buttons" id="option3"> <!--attention à id="responseThree"-->
                        <button class="btn" onclick="option3()"></button>
                    </div>
                    <br>
                    <div class="buttons" id="option4"> <!--attention à id="responseFour"-->
                        <button class="btn" onclick="option4()"></button>
                    </div>
                    <div>
                        <span id="timer"></span><!--attention à id="timer"-->
                    </div>
                    <div class="buttons" id="nextQuestion"><!--attention à id="nextQuestion"-->
                        <button class="btn" onclick="nextQuestion()" hidden>
                            Question suivante
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/quizz2.js"></script>
</html>