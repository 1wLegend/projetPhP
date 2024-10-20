<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/login.css"> 
</head>

<body>
    <form method="post" action="logindb_email.php">
        <h2>Se connecter</h2>
        <input type="text" name="usr" placeholder="Username / Email" required><br>
        <input type="password" name="pwd" placeholder="Password" required><br>
        <input type="submit" name="sub" value="Se connecter">
        <a href="register.php">S'inscrire</a>
        <a href="allLogin.php" class="login-link">Menu de connexion</a>
    </form>
</body>

</html>
