<?php

class DBConnection {
    private static $connection;

    public static function getConnection() {
        if (!self::$connection) {
            $config = parse_ini_file(__DIR__ . '/../app/config/config.ini');

            self::$connection = new mysqli($config['DB_HOST'], $config['DB_USERNAME'], $config['DB_PASSWORD'], $config['DB_DATABASE']);

            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$connection->connect_error);
            }
        }

        return self::$connection;
    }
}

// $db = new DBConnection;

// if ($db){
//     echo 'Connected successfully';
// }else{
//     echo 'Failed to connect to database server';
// }