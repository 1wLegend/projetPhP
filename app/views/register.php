<?php
require_once '../controllers/RegisterController.php';

$controller = new RegisterController();
list($email_error, $username_error) = $controller->register();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../../public/css/register.css">
</head>
<body>
    <div class="register-container">
        <h1>Inscription sur <span class="highlight">Yllusion</span></h1>
        <form action="" method="post" enctype="multipart/form-data">
            <?php if (!empty($email_error)) { echo "<span style='color: red;'>$email_error</span><br>"; } ?>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required><br>

            <?php if (!empty($username_error)) { echo "<span style='color: red;'>$username_error</span><br>"; } ?>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required><br>

            <label for="picture">Image de profil :</label>
            <input type="file" name="picture" id="picture"><br> 
            
            <input type="submit" name="submit" value="S'inscrire" class="submit-btn">
        </form>
        <br>
        <a href="allLogin.php" class="menu-btn">Menu de connexion</a>
        <p>Déjà un compte ? <a href="login.php" class="login-link">Se connecter</a></p>
    </div>
</body>
</html>
