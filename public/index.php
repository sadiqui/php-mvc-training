<?php
session_start();

// Include necessary files
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../app/services/AuthService.php');
require_once(__DIR__ . '/../app/controllers/AuthController.php');
require_once(__DIR__ . '/../app/models/User.php');

use App\Services\AuthService;

// Initialize the authentication service
AuthService::requireAuthentication();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neo Tech</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ecf0f1;
            text-align: center;
            margin: 50px;
        }

        h1 {
            color: #3498db;
        }

        p {
            margin-top: 20px;
            color: #777;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Neo Tech</h1>

    <p>Welcome to the most amazing platform ever!</p>

    <p>
        <a href="/dashboard">Go to Dashboard</a> |
        <a href="/logout">Logout</a>
    </p>
</body>
</html>