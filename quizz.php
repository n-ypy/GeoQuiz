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
<<<<<<< HEAD
    <div class="container">
=======
    <nav id="topnav">
        <input type="button" value="< Retour" onclick="history.back()">
        <input type="button" value="Se déconnecter" onclick="location.href='actions/disconnect.php'">
    </nav>
    <div class="container mt-5">
>>>>>>> 2ad228d30a72a45d18899c31b429dbf2c5e3888b
        <div class="row">
            <div class="col">
                <div class="question">
                    <div class="header">
                        <h1>GéoQuiz !</h1>
                        <span id="questionNumber"></span> <!--attention à id="questionNumber"-->
                    </div>
                </div>
                <form action="" type="POST">
                    <div class="question">
                        <div class="question-title">
                            <h5 id="enunciate"></h5> <!--attention à id="enunciate"-->
                        </div>
                        <div>
<<<<<<< HEAD
                        <span id="timer" class="timer-container"></span>
=======
                            <span id="timer"></span>
>>>>>>> 2ad228d30a72a45d18899c31b429dbf2c5e3888b
                        </div>
                        <div class="reponses">
                            <label class="radio" id="responseOne">
                                <input type="radio" name="reponse" value="">
                                <span></span> <!--attention à id="responseOne"-->
                            </label>
                        </div>
                        <br>
                        <div class="reponses">
                            <label class="radio" id="responseTwo">
                                <input type="radio" name="reponse" value="">
                                <span></span> <!--attention à id="responseTwo"-->
                            </label>
                        </div>
                        <br>
                        <div class="reponses">
                            <label class="radio" id="responseThree">
                                <input type="radio" name="reponse" value="">
                                <span></span> <!--attention à id="responseThree"-->
                            </label>
                        </div>
                        <br>
                        <div class="reponses">
                            <label class="radio" id="responseFour">
                                <input type="radio" name="reponse" value="">
                                <span></span> <!--attention à id="responseFour"-->
                            </label>
                        </div>
                        <div>
                            <button class="btn" type="submit">
                                Valider la réponse
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="js/quizz.js"></script>
</html>