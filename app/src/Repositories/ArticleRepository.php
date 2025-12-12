<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IArticleRepository;
use App\Framework\Repository;
use App\Models\ArticleModel;
use App\ViewModels\ArticleViewModel;
use \PDO;

class ArticleRepository extends Repository implements IArticleRepository
{

    public function getAll(): array
    {
        $sql = 'SELECT id, title, content, author, datetime FROM articles';
        $result = $this->getConnection()->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, ArticleModel::class);
    }

    public function getById(int $id): ?ArticleModel
    {
        $statement = $this->getConnection()->prepare(
            'SELECT id, title, content, author, datetime FROM articles WHERE id=:id'
        );

        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, ArticleModel::class);



        return $statement->fetch();
    }

    public function createArticle(ArticleViewModel $article): bool
    {
        $statement = $this->getConnection()->prepare(
            'INSERT INTO articles (title, content, author) VALUES (:title, :content, :author)'
        );

        $statement->bindValue(':title', $article->title);
        $statement->bindValue(':content', $article->content);
        $statement->bindValue(':author', $article->author);

        return $statement->execute();
    }

    public function updateArticle(ArticleViewModel $article): bool
    {
        $statement = $this->getConnection()->prepare(
            'UPDATE articles set title = :title, content = :content, author = :author WHERE id = :id'
        );

        $statement->bindValue(':title', $article->title);
        $statement->bindValue(':content', $article->content);
        $statement->bindValue(':author', $article->author);

        $statement->bindValue(':id', $article->id);

        return $statement->execute();
    }

    public function deleteArticle(int $id): bool
    {
        $statement = $this->getConnection()->prepare(
            query: 'DELETE FROM articles WHERE id=:id;'
        );

        $statement->bindValue(':id', $id);

        return $statement->execute();
    }
}
