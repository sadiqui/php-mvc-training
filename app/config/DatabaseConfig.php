<?php

namespace App\Config;

class DatabaseConfig
{
    public static function getConfig()
    {
        // Load environment variables from .env file
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        return [
            'host'     => $_ENV['DB_HOST'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'database' => $_ENV['DB_DATABASE'],
        ];
    }
}

?>
