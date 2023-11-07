<?php
session_start();
if (!isset($_SESSION['id'])) {
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
        <p><?= $_SESSION['username'] ?></br><span id="user-score">0&nbsp;points</span></p>
        <input type="button" value="Déconnexion" onclick="location.href='actions/disconnect.php'">
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="question">
                    <div class="header">
                        <h1>GéoQuiz !</h1>
                        <span id="question-number"></span> <!--attention à id="question-number"-->
                    </div>
                </div>
                <div class="question">
                    <div class="question-title">
                        <h5 id="question"></h5> <!--attention à id="question"-->
                    </div>
                    <div id="countdown">
                        <div class="countdown-number" id="timer"></div>
                        <svg>
                            <circle class="animate-circle" r="18" cx="20" cy="20"></circle>
                        </svg>
                    </div>
                    <div id="options-container">
                        <div class="rollover" id="option_one"> <!--attention à id="option_one"-->
                            <button class="btn" onclick="verifyAnswer('option_one')"></button>
                        </div>
                        <div class="rollover" id="option_two"> <!--attention à id="option-two"-->
                            <button class="btn" onclick="verifyAnswer('option_two')"></button>
                        </div>
                        <div class="rollover" id="option_three"> <!--attention à id="option-three"-->
                            <button class="btn" onclick="verifyAnswer('option_three')"></button>
                        </div>
                        <div class="rollover" id="option_four"> <!--attention à id="option-four"-->
                            <button class="btn" onclick="verifyAnswer('option_four')"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/quiz_v2.js"></script>

</html>