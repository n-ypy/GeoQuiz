<?php
$dbHostname = getenv("MYSQL_HOSTNAME");
$dbName = getenv("MYSQL_DB_NAME");
$dbUsername = getenv("MYSQL_USERNAME");
$dbPwd = getenv("MYSQL_PWD");

try {
    $pdoQuizz = new PDO("mysql:host=$dbHostname;dbname=$dbName", "$dbUsername", "$dbPwd", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $exception) {
    $_SESSION['lastErrMsg'] = $exception->getMessage();
    header('Location: ../index.php?err=PDOconnection');
    exit();
}
