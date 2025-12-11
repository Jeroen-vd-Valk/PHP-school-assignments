<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Repositories\Interfaces\IArticleRepository;
use App\Services\Interfaces\IArticleService;
use App\Models\ArticleModel;
use App\ViewModels\ArticleViewModel;
use InvalidArgumentException;
use mysqli_sql_exception;

class ArticleService implements IArticleService
{
    private IArticleRepository $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    public function getAll(): array
    {
        return $this->articleRepository->getAll();
    }

    public function getById(int $id): ?ArticleModel
    {
        return $this->articleRepository->getById($id);
    }

    public function createArticle(ArticleViewModel $article): void
    {
        $this->articleRepository->createArticle($article) ?: throw new mysqli_sql_exception('Something went wrong creating the article in the database, please try again.');
    }

    public function updateArticle(ArticleViewModel $article): void
    {
        $this->articleRepository->updateArticle($article) ?: throw new mysqli_sql_exception('Something went wrong updating the article in the database, please try again.');
    }

    public function deleteArticle(int $id): void
    {
        $this->articleRepository->deleteArticle($id) ?: throw new InvalidArgumentException('Article to be deleted could not be found, please try again.');
    }
}
