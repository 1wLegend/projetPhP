<?php

include "main.php";

$myusername = $_POST['usr'];
$mypassword = $_POST['pwd'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($conn, $myusername);
$mypassword = mysqli_real_escape_string($conn, $mypassword);

$sql = "SELECT * FROM email_log WHERE (username='$myusername' OR email='$myusername')";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    $row = mysqli_fetch_assoc($result);
    
    if (password_verify($mypassword, $row['password'])) {
        $insert_query = "INSERT INTO logs_connexion (user_id, username) VALUES ('{$row['id']}', '{$row['username']}')";
        mysqli_query($conn, $insert_query);
        
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
            header("location: admin_logs.php"); 
        } else {
            header("location: quizz.php"); 
        }
    } else {
        echo "<p style='color: red; text-align: center;'>Nom d'utilisateur ou mot de passe incorrect</p>";
    }
} else {
    echo "<p style='color: red; text-align: center;'>Nom d'utilisateur ou mot de passe incorrect</p>";
}

mysqli_close($conn);
?>
