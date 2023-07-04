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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
</head>
<body>
    <?php include "actions/get-bestscore.php" ?>
</body>
</html>