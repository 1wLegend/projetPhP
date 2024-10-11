<?php
require_once '../app/controllers/UserController.php';
require_once '../app/config/config.php'; 

$db = new DbConn('localhost', 'root', '', 'yllusion-portal');
$db->connect();

$requestUri = $_SERVER['REQUEST_URI'];

$userController = new UserController($db);

switch ($requestUri) {
    case '/register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->register();  
        } else {
            $userController->showRegister();  
        }
        break;

    default:
        echo "Page non trouvée."; 
        break;
}
