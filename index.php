<?php
require_once __DIR__ . '/app/controllers/UserController.php';
require_once __DIR__ . '/app/config/db-conn.php';

$db = new DbConn('localhost', 'root', '', 'yllusion-portal');
$db->connect();

$requestUri = trim($_SERVER['REQUEST_URI'], '/');

$userController = new UserController($db);

switch ($requestUri) {
    case '/register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->register();  
        } else {
            $userController->showRegister();  
        }
        break;
    case 'projetPhP/test':
        echo'HEY';
        break;
    default:
        echo "404 - Page non trouvée."; 
        break;
}
