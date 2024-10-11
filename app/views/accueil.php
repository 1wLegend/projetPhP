<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="https://kit.fontawesome.com/459ca3d53b.js" crossorigin="anonymous"></script>
    <title>Yllusion RP | Portal</title>
</head>

<body>
    <div class="icon-right-page">
        <i class="fa-solid fa-moon" style="display: none;"></i>
        <i class="fa-regular fa-moon"></i>
    </div>

    <ul>
        <img id="flip-logo" src="" alt="Yllusion RP">
        <hr class="line">
        <li><a href="#home"><i class="fa-solid fa-house"></i> Accueil</a></li>
        <p class="separation-deux-nav">Espace WhiteList</p>
        <li><a href="#answer"><i class="fa-solid fa-question"></i> Questionnaire</a></li>
        <li><a href="#rules"><i class="fa-solid fa-circle-info"></i> Informations HRP</a></li>
        <li><a href="#services"><i class="fa-solid fa-user"></i> Crée son personnage</a></li>
        <div class="bottom-page">
            <li><a href="#contact"><i class="fa-solid fa-envelope"></i> Un problème ?</a></li>
        </div>
    </ul>


    <div class="navbartopjustevatar">
        <div class="navbartopjustevatar-content">
            <div class="navbartopjustevatar-content-avatar">
                <!-- Afficher l'avatar Discord s'il est présent, sinon utiliser l'avatar Google -->
                <img src="<?= !empty($userinfo['picture']) ? $userinfo['picture'] : $discord_avatar; ?>" alt="Avatar">

                <!-- Afficher le nom complet s'il est présent, sinon l'ID Discord -->
                <p><?= !empty($userinfo['full_name']) ? $userinfo['full_name'] : $discord_id; ?></p>
            </div>
            <div class="navbartopjustevatar-content-logout">
                <a href="logout.php">Se déconnecter</a>
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
            <p>ACCUEIL/PAGE.HTML
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