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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION['id'])) {
            echo <<<html
            <nav id="topnav" style = "justify-content: end;">
            <input type="button" value="Se déconnecter" onclick="location.href='actions/disconnect.php'">
            </nav>
            <h1>Bienvenue sur <b>GéoQuiz,</b> {$_SESSION['username']} !</h1>
            <button type="submit" class="btn mt-3" onclick="window.location.href='leaderboard.php';">Leaderboard</button>
            <button type="submit" class="btn mt-3" onclick="window.location.href='quizz.php';">Quizz v1</button>
            <button type="submit" class="btn mt-3" onclick="window.location.href='quizz2.php';">Quizz v2</button>
        html;
        } else {
            echo <<<html

        <h1>Bienvenue sur <b>GéoQuiz !</b></h1>
        <form action="actions/login.php" method="POST">
            <input type="text" name="username" class="form-control" placeholder="Prénom" aria-label="Entre ton prénom :" required>
            <button type="submit" class="btn mt-3">Jouer!</button>
        </form>

    html;
        }
        ?>
    </div>
</body>
<script src="js/index.js"></script>

</html>