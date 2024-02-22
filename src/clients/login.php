<?php
session_start();

// L'utilisateur est déjà connecté
if (isset($_SESSION['userId'])) {
    header("Location: ../index.php");
    exit();
}

// Configuration de la base de données
require_once(dirname(__FILE__) . '/../config/db.php');

// Requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Récupére l'utilisateur avec l'email
    $stmt = $dbh->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Récupérer l'utilisateur
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // Stocker les informations de l'utilisateur dans la session
        $_SESSION['userId'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        // Redirection vers la page d'accueil après la connexion
        header("Location: ../index.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        $error_message = "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        form {
            max-width: 300px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
            margin-top: -10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<h2>Connexion</h2>
<?php
if (isset($error_message)) {
    echo "<p class='error'>$error_message</p>";
}
?>
<form method="post">
    <p>
        <label for="email">Email :</label>
        <input type="text" name="email" required>
    </p>
    <p>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>
    </p>
    <input type="submit" value="Se connecter">
</form>
</body>
</html>
