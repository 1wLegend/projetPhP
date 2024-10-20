<?php
require_once '../config/db-conn.php';

class UserModel {
    private $conn;

    public function __construct() {
        $db = new DbConn('localhost', 'root', '', 'yllusion-portal');
        $this->conn = $db->connect();
    }

    public function register($username, $email, $password, $picture) {
        $sql = "INSERT INTO email_log (email, username, password, picture, role) VALUES (?, ?, ?, ?, 'user')";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssss", $email, $username, $password, $picture);
            $stmt->execute();
            return $stmt->insert_id;
        }
        return false;
    }

    public function checkUserExists($username, $email) {
        $sql = "SELECT * FROM email_log WHERE email = ? AND username = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ss", $email, $username);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }
        return false;
    }

    public function getUserByUsernameOrEmail($username) {
        $sql = "SELECT * FROM email_log WHERE (username = ? OR email = ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ss", $username, $username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }
        return null;
    }
}