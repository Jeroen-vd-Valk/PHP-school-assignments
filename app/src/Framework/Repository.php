<?php

namespace App\Framework;

use App\Config;

use PDO;

class Repository
{

    private static ?PDO $connection = null;

    protected function getConnection(): PDO
    {
        if (self::$connection === null) {
            $this->connect();
        }
        return self::$connection;
    }

    private function connect()
    {
        try {
            //Create a new connection string, DON'T DO THIS DIRECTLY IN A REPOSITORY, THIS IS BAD
            $connectionString = 'mysql:host=' . Config::DB_SERVER_NAME . ';dbname=' . Config::DB_NAME . ';charset=utf8mb4';

            //Create a new PDO connection, ALSO DON'T DO THIS DIRECTLY IN A REPOSITORY, THIS IS ALSO BAD
            self::$connection = new PDO(
                $connectionString,
                Config::DB_USERNAME,
                Config::DB_PASSWORD
            );

            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $pdoe) {
            error_log($pdoe->getMessage());
        }
    }
}
