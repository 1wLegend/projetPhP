<?php
require_once '../models/UserModel.php';

class RegisterController {
    private $user;

    public function __construct() {
        $this->user = new UserModel();
    }

    public function register() {
        $email_error = '';
        $username_error = '';

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            if ($this->user->checkUserExists($username, $email)) {
                $email_error = "Cet email et ce nom d'utilisateur sont déjà utilisés ensemble.";
                $username_error = $email_error;
            }

            if (empty($email_error) && empty($username_error)) {
                $picture = $this->handleProfilePicture($username);
                if ($this->user->register($username, $email, $password, $picture)) {
                    header("Location: login.php?success=Votre compte a été créé avec succès");
                    exit();
                } else {
                    echo "<p style='color: red;'>Erreur lors de l'inscription.</p>";
                }
            }
        }
        return [$email_error, $username_error];
    }

    private function handleProfilePicture($username) {
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] === 0) {
            $img_name = $_FILES['picture']['name'];
            $tmp_name = $_FILES['picture']['tmp_name'];
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $allowed_exs = ['jpg', 'jpeg', 'png'];

            if (in_array(strtolower($img_ex), $allowed_exs)) {
                $new_img_name = uniqid($username, true) . '.' . strtolower($img_ex);
                $img_upload_path = '../../upload/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                return $new_img_name;
            }
        }
        return '';
    }
}
