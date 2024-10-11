<?php
require_once '../app/models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function showRegister() {
        require '../app/views/register.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $picture = $_POST['picture'];

            $result = $this->userModel->register($email, $username, $password, $picture);

            if ($result) {
                header("Location: quizz.php");
                exit();
            } else {
                echo "<p style='color: red;'><strong>Erreur lors de l'inscription :</strong> " . mysqli_error($this->db->connect()) . "</p>";
            }
        }
    }
}
