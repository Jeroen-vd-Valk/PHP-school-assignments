<?php

namespace App\Services\Interfaces;

use App\Models\ArticleModel;
use App\ViewModels\ArticleViewModel;

interface IArticleService
{

    public function getAll(): array;

    public function getById(int $id): ?ArticleModel;

    public function createArticle(ArticleViewModel $article): void;

    public function updateArticle(ArticleViewModel $article): void;

    public function deleteArticle(int $id): void;
}
