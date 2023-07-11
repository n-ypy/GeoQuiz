<?php
session_start();
if (isset($_SESSION['lastErrMsg'])) {
    echo $_SESSION['lastErrMsg'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>GéoQuiz</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
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

                    <div class="" id="option1"> <!--attention à id="responseOne"-->
                        <button class="btn" onclick="option1()"></button>
                    </div>
                    <br>
                    <div class="" id="option2"> <!--attention à id="responseTwo"-->
                        <button class="btn" onclick="option2()"></button>
                    </div>
                    <br>
                    <div class="" id="option3"> <!--attention à id="responseThree"-->
                        <button class="btn" onclick="option3()"></button>
                    </div>
                    <br>
                    <div class="" id="option4"> <!--attention à id="responseFour"-->
                        <button class="btn" onclick="option4()"></button>
                    </div>
                    <div>
                        <span id="timer"></span><!--attention à id="timer"-->
                    </div>
                    <div class="" id="nextQuestion"><!--attention à id="nextQuestion"-->
                        <button class="btn" onclick="nextQuestion()" hidden>
                            Question suivante
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="quizz2.js"></script>

</html>