<?php
session_start();
require_once(dirname(__FILE__) . '/../config/db.php');



if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit();
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    global $dsn, $db_user, $db_pass;
    $dbh = new PDO($dsn, $db_user, $db_pass);

    $stmt = $dbh->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo 'Password is valid!';
        $_SESSION['user_id'] = $user['id'];
        header("Location: /parts/orderList.php");
    } else {
        echo 'Invalid password.';
    }
}

