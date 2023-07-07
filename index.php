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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Bienvenue sur <b>GéoQuiz !</b></h1>
        <form action="actions/login.php" method="POST">
            <input type="text" name="username" class="form-control" placeholder="Prénom" aria-label="Entre ton prénom :" required>
            <button type="submit" class="btn mt-3">Jouer!</button>
        </form>
    </div>
</body>

</html>
