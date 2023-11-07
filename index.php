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
    <meta name="viewport" content="initial-scale=1.0">
    <title>GéoQuiz</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="container" id="index-container">
        <?php
        if (isset($_SESSION['id'])) {
            echo <<<html
            <nav id="topnav" style = "justify-content: end;">
                <input type="button" value="Déconnexion" onclick="location.href='actions/disconnect.php'">
            </nav>
            <h1 id="welcome-msg">Bienvenue sur <b>GéoQuiz,</b> {$_SESSION['username']}&nbsp;!</h1>
            <div id="btn-list-index">
                <div id="row">
                    <button type="submit" class="btn" onclick="window.location.href='quiz_v2.php';">Nouveau Quiz</button>
                    <button type="submit" class="btn" onclick="window.location.href='quiz.php';">Ancien Quiz</button>
                    <button type="submit" class="btn" onclick="window.location.href='leaderboard.php';">Classement</button>
                </div>
            </div>
        html;
        } else {
            echo <<<html
            <h1 id="welcome-msg">Bienvenue sur <b>GéoQuiz&nbsp;!</b></h1>
            <form action="actions/login.php" method="POST">
                <input type="text" name="username" class="form-control" placeholder="Prénom" aria-label="Entre ton prénom :" required>
                <button type="submit" class="btn">Jouer!</button>
            </form>
    html;
        }
        ?>
    </div>
</body>
<script src="js/index.js"></script>

</html>