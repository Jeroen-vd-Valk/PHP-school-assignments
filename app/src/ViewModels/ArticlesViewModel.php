<?php

namespace App\ViewModels;

use App\Models\ArticleModel;

class ArticlesViewModel
{

    /**
     * @var ArticleModel[]
     */
    public array $articles;

    public function __construct(array $articles)
    {
        $this->articles = $articles;
    }
}
