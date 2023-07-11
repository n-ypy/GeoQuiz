<?php
session_start();
if(isset($_SESSION['lastErrMsg'])){
    echo $_SESSION['lastErrMsg'];
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>GéoQuiz</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Bienvenue sur <b>GéoQuiz !</b></h1>
        <form action="actions/login.php" method="POST">
            <input type="text" name="username" class="form-control" placeholder="Prénom" value="<?=isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>" aria-label="Entre ton prénom :" required>
            <button type="submit" class="btn">Jouer!</button>
        </form>
    </div>
</body>
<script src="js/index.js"></script>
</html>
