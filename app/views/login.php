<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        form {
            width: 300px;
            padding: 50px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"],
        a {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #4caf50;
            font-size: 14px;
            display: block;
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
    </form>
</body>
</html>
