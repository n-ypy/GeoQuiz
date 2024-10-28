<?php
$dbHostname = getenv("MYSQL_HOSTNAME") ?? "127.0.0.1";
$dbName = getenv("MYSQL_DB_NAME") ?? "geoquiz";
$dbUsername = getenv("MYSQL_USERNAME") ?? "root";
$dbPwd = getenv("MYSQL_PWD") ?? "";

try {
    $pdoQuizz = new PDO("mysql:host=$dbHostname;dbname=$dbName", "$dbUsername", "$dbPwd", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $exception) {
    echo $exception->getMessage();
    die();
    $_SESSION['lastErrMsg'] = $exception->getMessage();
    header('Location: ../index.php?err=PDOconnection');
    exit();
}