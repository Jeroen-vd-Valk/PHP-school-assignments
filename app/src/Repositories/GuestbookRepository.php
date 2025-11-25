<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\IGuestbookRepository;
use App\Config;
use \PDO;

class GuestbookRepository implements IGuestbookRepository
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


    public function getAll(): array
    {
        $connection = $this->connectToDatabase();

        $sql = 'SELECT id, posted_at, name, email, message FROM posts';
        $result = $connection->query($sql);
        $posts = $result->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    public function createEntry(): void
    {
        $connection = $this->connectToDatabase();

        $statement = $connection->prepare(
            'INSERT INTO posts (name, email, message) VALUES (:name, :email, :message)'
        );

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':message', $message);

        $statement->execute();
    }
}
