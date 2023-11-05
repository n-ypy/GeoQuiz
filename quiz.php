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
    <meta name="viewport" content="initial-scale=1.0">
    <title>GéoQuiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav id="topnav">
        <input type="button" value="< Retour" onclick="history.back()">
        <p><?=$_SESSION['username']?> : <span id="user-score">0 points</span></p>
        <input type="button" value="Déconnexion" onclick="location.href='actions/disconnect.php'">
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="question">
                    <div class="header">
                        <h1>GéoQuiz !</h1>
                        <span id="question-number"></span> <!--attention à id="question-number"-->
                    </div>
                </div>
                <form action="" type="POST">
                    <div class="question">
                        <div class="question-title">
                            <h5 id="question"></h5> <!--attention à id="question"-->
                        </div>
                        <div class="timer-container">
                            <span id="timer"></span>
                        </div>
                        <div class="options">
                            <label class="radio" id="option-one">
                                <input type="radio" name="option" value="">
                                <span></span> <!--attention à id="option-one"-->
                            </label>
                        </div>
                        <br>
                        <div class="options">
                            <label class="radio" id="option-two">
                                <input type="radio" name="option" value="">
                                <span></span> <!--attention à id="option-two"-->
                            </label>
                        </div>
                        <br>
                        <div class="options">
                            <label class="radio" id="option-three">
                                <input type="radio" name="option" value="">
                                <span></span> <!--attention à id="option-three"-->
                            </label>
                        </div>
                        <br>
                        <div class="options">
                            <label class="radio" id="option-four">
                                <input type="radio" name="option" value="">
                                <span></span> <!--attention à id="option-four"-->
                            </label>
                        </div>
                        <div>
                            <button class="btn" id="btn-next-question" type="submit">
                                Valider la réponse
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="js/quiz.js"></script>
</html>