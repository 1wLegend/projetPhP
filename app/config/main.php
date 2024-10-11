<?php
include 'db-conn.php';

try {
    $db = new DbConn('localhost', 'root', '', 'yllusion-portal');
    $conn = $db->connect();
} catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}
