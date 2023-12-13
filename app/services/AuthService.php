<?php

namespace App\Services;

class AuthService
{
    public static function isAuthenticated()
    {
        return isset($_SESSION['user_id']);
    }

    public static function getAuthenticatedUserId()
    {
        return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    }

    public static function requireAuthentication()
    {
        // Redirect to the login page if the user is not authenticated
        if (!self::isAuthenticated()) {
            header('Location: /login');
            exit;
        }
    }

    public static function requireAdminRole()
    {
        // Redirect to the login page if the user is not authenticated
        self::requireAuthentication();

        $userId = self::getAuthenticatedUserId();
        $userModel = new \App\Models\User();
        $user = $userModel->getUserById($userId);

        if (!$user || $user['role'] !== 'admin') {
            // Redirect to a restricted access page or show an error message
            header('Location: /access-denied');
            exit;
        }
    }
}

?>

<!--
namespace App;

require_once(__DIR__ . '/config/DatabaseConfig.php');
require_once(__DIR__ . '/../database/DBConnection.php');

class Users
{
    private $db;

    public function __construct()
    {
        // Connect to the database
        $this->db = \Database\DBConnection::getConnection();
    }

    public function registerUser($username, $email, $password)
    {
        $salt = $this->generateSalt();
        $hashedPassword = $this->hashPassword($password, $salt);

        // Prepare and execute the SQL query for user registration
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password_hash, salt) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $salt);

        $registrationSuccess = $stmt->execute();

        $stmt->close();

        return $registrationSuccess;
    }

    public function loginUser($username, $password)
    {
        $stmt = $this->db->prepare("SELECT id, password_hash, salt FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userId, $storedPassword, $salt);
            $stmt->fetch();

            $hashedPassword = $this->hashPassword($password, $salt);

            if ($hashedPassword === $storedPassword) {
                $stmt->close();
                return $userId;
            }
        }

        $stmt->close();
        return false;
    }

    private function generateSalt()
    {
        return bin2hex(random_bytes(25));
    }

    private function hashPassword($password, $salt)
    {
        return hash('sha256', $password . $salt);
    }

    public function __destruct()
    {
        // Close the database connection when the object is destroyed
        if ($this->db) {
            $this->db->close();
        }
    }
}

?> -->

<!--
class Authtication {

    private $users = [       // Exemple de demo en cours d'amélioration ...
        'john_doe' => '$2y$10$JWq.t8k8h.9CgB9LJ2CjDOv8XtdSw9Ug4dIiKOlNMtXUW9lqDT6FS',
        'jane_smith' => '$2y$10$WuGpg3tM17xmKSUJoOblYOC5O13gIKL2LklDzO.UqRyvdMNfuNUr2',
    ];

    public function login($username, $password) {

        if (isset($this->users[$username])) {
            if (password_verify($password, $this->users[$username])) {
                $_SESSION['user'] = $username;
                return true;
            }
        }

        return false;
    }

    public function logout() {
        unset($_SESSION['user']);
    }

    public function register($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->users[$username] = $hashedPassword;
    }

    public function isAuthenticated() {
        return isset($_SESSION['user']);
    }

    public function getCurrentUser() {
        return $_SESSION['user'] ?? null;
    }
} -->