<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #121212;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        width: 400px;
        padding: 60px;
        background-color: #1e1e1e;
        border-radius: 8px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
    }

    input[type="text"],
    input[type="password"],
    input[type="submit"],
    a {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #555;
        border-radius: 4px;
        font-size: 16px;
        background-color: #2c2c2c;
        color: #fff;
    }

    input[type="text"]::placeholder,
    input[type="password"]::placeholder {
        color: #999;
    }

    input[type="submit"] {
        background-color: #a259ff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #8a3ccc;
    }

    a {
        text-decoration: none;
        color: #a259ff;
        font-size: 14px;
        text-align: center;
        display: block;
    }

    a:hover {
        text-decoration: underline;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-link {
        color: #a259ff;
        text-decoration: none;
    }

    .login-link:hover {
        text-decoration: underline;
    }

    p {
        margin-top: 10px;
        font-size: 14px;
        text-align: center;
    }
    </style>
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
