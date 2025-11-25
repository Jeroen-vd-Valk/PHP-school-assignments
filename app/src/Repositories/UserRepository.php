<?php

namespace App\Repositories;


use App\Repositories\Interfaces\IUserRepository;
use \PDO;
use \App\Config;

class UserRepository implements IUserRepository
{
    private function connectToDatabase(): PDO
    {
        //Create a new connection string, DON'T DO THIS DIRECTLY IN A REPOSITORY, THIS IS BAD
        $connectionString = 'mysql:host=' . Config::DB_SERVER_NAME . ';dbname=' . Config::DB_NAME . ';charset=utf8mb4';

        //Create a new PDO connection, ALSO DON'T DO THIS DIRECTLY IN A REPOSITORY, THIS IS ALSO BAD
        $connection = new \PDO(
            $connectionString,
            Config::DB_USERNAME,
            Config::DB_PASSWORD
        );

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }

    public function getUserByUsername(string $username): ?array
    {
        $connection = $this->connectToDatabase();

        $statement = $connection->prepare(
            'SELECT username, password FROM users WHERE username=:username'
        );
        $statement->bindValue(':username', $username);
        $statement->execute();
        $return = $statement->fetch(PDO::FETCH_ASSOC);

        if ($return === false) {
            return null;
        } else {
            return $return;
        }
    }
}
