<?php

namespace App\Repositories\Interfaces;

use App\Models\ArticleModel;
use App\ViewModels\ArticleviewModel;


interface IArticleRepository
{
    public function getAll(): array;

    public function getById(int $id): ?ArticleModel;

    public function createArticle(ArticleViewModel $article): bool;

    public function updateArticle(ArticleViewModel $article): bool;

    public function deleteArticle(int $id): bool;
}
