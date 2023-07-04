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
    <title>Home</title>
</head>
<body>
    <form action="actions/login.php" method="POST">
        <label for="username">Enter your username :</label>
        <input type="text" name="username" required>
        <button type="submit">Play!</button>
    </form>
</body>
</html>