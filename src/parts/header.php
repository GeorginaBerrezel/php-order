<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header avec style</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        nav ul li a:hover {
            color: #ffc107;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="/index.php">Connexion</a></li>
            <li><a href="/parts/orderList.php">Mes commandes</a></li>
            <li><a href="/parts/productList.php">Les produits</a></li>
        </ul>
    </nav>
</header>

</body>
</html>
