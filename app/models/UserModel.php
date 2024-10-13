<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($email, $username, $password, $picture) {
        $query = "INSERT INTO users (email, username, password, picture) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $email, $username, $password, $picture);
        return $stmt->execute();
    }

    public function getDbConnection() {
        return $this->db;
    }
}

