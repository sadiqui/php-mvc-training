<?php

namespace App\Controllers;

use App\Users;

class AuthController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $users = new \App\Users();

            $registrationSuccess = $users->registerUser($username, $email, $password);

            if ($registrationSuccess) {
                header('Location: /success');
                exit;
            } else {
                echo "Registration failed. Please try again.";
            }
        }

        include(__DIR__ . '/../views/register.php');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $users = new \App\Users();

            $userId = $users->loginUser($username, $password);

            if ($userId) {
                $_SESSION['user_id'] = $userId;

                header('Location: /dashboard');
                exit;
            } else {
                echo "Login failed. Please check your username and password.";
            }
        }

        include(__DIR__ . '/../views/login.php');
    }

    public function logout()
    {
        session_destroy();

        header('Location: /login');
        exit;
    }
}

?>

<!-- class AuthController {
    private $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function showLoginForm() {
        include('../views/login_form.php');
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($this->authService->login($username, $password)) {
            header('Location: ../../public/index.php');
            exit;
        } else {
            include('../views/login_form.php');
        }
    }

    public function logout() {
        $this->authService->logout();
        header('Location: ../../public/index.php');
        exit;
    }

    public function showRegistrationForm() {
        include('../views/registration_form.php');
    }

    public function register() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $this->authService->register($username, $password);

        // Rediriger vers la page de connexion après l'enregistrement...
        header('Location: /login');
        exit;
    }
} -->