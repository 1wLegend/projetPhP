<?php 
include "../config/main.php";

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $email = $_POST['email'];
    $user_role = 'user';
    $sql = "INSERT INTO email_log (email, username, password, role) VALUES ('$email','$username', '$password', '$user_role')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: accueil.php"); 
    } else {
        echo "<p style='color: red;'><strong>Erreur lors de l'inscription :</strong> " . mysqli_error($conn) . "</p>";
    }
}
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
        <form action="register.php" method="post">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required><br>
            
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required><br>

            <label for="picture">Image de profil (URL) :</label>
            <input type="text" name="picture" id="picture"><br>
            
            <input type="submit" name="submit" value="S'inscrire" class="submit-btn">
        </form>
        <p>Déjà un compte ? <a href="login.php" class="login-link">Se connecter</a></p>
    </div>
</body>
</html>
