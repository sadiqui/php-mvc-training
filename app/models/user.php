<?php

namespace App\Models;

use Database\DBConnection;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getConnection();
    }

    public function getUserById($userId)
    {
        $stmt = $this->db->prepare("SELECT id, username, email, role, created_at FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        return $user;
    }

    public function __destruct()
    {
        // Close the database connection when the object is destroyed
        if ($this->db) {
            $this->db->close();
        }
    }
}

?>
