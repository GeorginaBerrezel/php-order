<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'utilisateur', 'motdepasse', 'order_php_exam');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if(isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashage du mot de passe

    // Préparer la requête d'insertion
    $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur enregistré avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement de l'utilisateur: " . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
<h2>Inscription</h2>
<form method="post" action="register.php">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="register" value="S'inscrire">
</form>
</body>
</html>
