<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dbh = new PDO('mysql:host=mysql', "root", "mariadb_password");
$migrations = scandir("./");

foreach ($migrations as $sqlFilePath) {
    if (pathinfo($sqlFilePath, PATHINFO_EXTENSION) !== "sql") {
        continue;
    }
    if (pathinfo($sqlFilePath, PATHINFO_FILENAME) === "data") {
        continue;
    }
    $sqlScript = file_get_contents($sqlFilePath);
    var_dump($sqlScript);
    $sth = $dbh->prepare($sqlScript);
    if (!$sth->execute()) {
        throw new Exception("Error with script $sqlFilePath : '$sqlScript'");
    }
}
