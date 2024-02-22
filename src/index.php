<?php
session_start();

if(isset($_POST['login'])) {
    // Vérifie les identifiants (utilise un meilleur mécanisme en production)
    if($_POST['email'] == 'utilisateur' && $_POST['password'] == 'motdepasse') {
        // *select avec des conditions requête base de donnée qui permet de vérifier. Chiffrer mes mots de passe à l'avance
        $_SESSION['user'] = $_POST['username'];
//        header('Location: command_form.php');
        exit();
    } else {
        echo "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form method="post" action="">
    <label for="email">Email:</label>
    <input type="text" name="email" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" autocomplete="current-password" required>
    <input type="submit" name="login" value="Login">
</form>
</body>
</html>
