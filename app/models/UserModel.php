<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($email, $username, $password, $picture, $user_role = 'user') {
        $sql = "INSERT INTO email_log (email, username, password, picture, role) 
                VALUES ('$email', '$username', '$password', '$picture', '$user_role')";
        
        return $this->db->insert($sql);
    }
}
