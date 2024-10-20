<?php
session_start();

include "../config/main.php";

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM email_log";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $email_logs = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $email_logs = [];
}

echo "<script>console.log('Debugging Session Data: " . json_encode($_SESSION) . "');</script>";

if (!empty($_SESSION['picture'])) {
    echo "<script>console.log('Picture is set in session: " . $_SESSION['picture'] . "');</script>";
} else {
    echo "<script>console.log('Picture is NOT set in session');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <script src="https://kit.fontawesome.com/459ca3d53b.js" crossorigin="anonymous"></script>
    <title>Yllusion RP | Portal</title>
</head>

<body>
    <div class="icon-right-page">
        <i class="fa-solid fa-moon" style="display: none;"></i>
        <i class="fa-regular fa-moon"></i>
    </div>

    <ul>
        <img id="flip-logo" src="../../public/img/yllusion.png" alt="Yllusion RP">
        <hr class="line">
        <li><a href="#home"><i class="fa-solid fa-house"></i> Accueil</a></li>
        <p class="separation-deux-nav">Espace WhiteList</p>
        <li><a href="#answer"><i class="fa-solid fa-question"></i> Questionnaire</a></li>
        <li><a href="#rules"><i class="fa-solid fa-circle-info"></i> Informations HRP</a></li>
        <li><a href="resume.php"><i class="fa-solid fa-user"></i> Crée son personnage</a></li>
        <div class="bottom-page">
            <li><a href="#contact"><i class="fa-solid fa-envelope"></i> Un problème ?</a></li>
        </div>
    </ul>

    <div class="navbartopjustevatar">
        <div class="navbartopjustevatar-content">
            <div class="navbartopjustevatar-content-avatar">
                <?php 
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    if (!empty($_SESSION['picture'])) {
                        $avatar = '../../upload/' . $_SESSION['picture'];
                        echo '<img src="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" alt="Avatar" onerror="this.onerror=null; this.src=\'../../public/img/defaut_avatar.jpg\';">';
                        echo "<script>console.log('Avatar path: " . $avatar . "');</script>";
                    } else {
                        echo '<img src="../../public/img/defaut_avatar.jpg" alt="Avatar">';
                        echo '<p>Aucun avatar défini</p>';
                    }
                    echo '<p>' . htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . '</p>';
                    echo '<p>' . htmlspecialchars($_SESSION['emailLog_id'], ENT_QUOTES, 'UTF-8') . '</p>';
                } else {
                    echo '<img src="../../public/img/defaut_avatar.jpg" alt="Avatar">';
                    echo '<p>Utilisateur inconnu</p>';
                }
                ?>
            </div>
            <div class="navbartopjustevatar-content-logout">
                <?php 
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<a href="logout.php">Se déconnecter</a>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="pageurl">
        <div class="url-bar">
            <div class="buttons">
                <div class="button close"></div>
                <div class="button minimize"></div>
                <div class="button maximize"></div>
            </div>
            <p>ACCUEIL/PAGE.HTML</p>
        </div>
    </div>

    <div class="middle-box">
        <div class="middle-box-content">
            <div class="middle-box-content-title">
                <h1>Yllusion RP</h1>
                <p>Un serveur RP sur GTA V</p>
            </div>
            <div class="middle-box-content-text">
                <p>Yllusion RP est un serveur RP sur GTA V qui a pour but de vous offrir une expérience de jeu unique.
                    Vous pourrez incarner le personnage de votre choix et vivre des aventures incroyables dans la ville
                    de Los Santos.</p>
            </div>
        </div>
    </div>
</body>

</html>
