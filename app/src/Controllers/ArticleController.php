<?php

namespace App\Controllers;

use App\Services\Interfaces\IArticleService;
use App\Services\ArticleService;
use App\ViewModels\ArticlesViewModel;
use App\ViewModels\ArticleViewModel;
use InvalidArgumentException;

class ArticleController
{
    private IArticleService $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index()
    {
        $articles = $this->articleService->getAll();

        $vm = new ArticlesViewModel($articles);

        require __DIR__ . '/../Views/articles/index.php';
    }

    public function articleDetails(array $params)
    {
        try {
            if (is_numeric($params['id'])) {
                $id = intval($params['id']);
            } else {
                throw new InvalidArgumentException('Invalid ID. A numeric value is required to see an article');
            }
            $article = $this->articleService->getById($id);

            require __DIR__ . '/../Views/articles/article_details.php';
        } catch (InvalidArgumentException $e) {
            die('' . $e->getMessage());
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }

    public function articleAddView()
    {
        require __DIR__ . '/../Views/articles/article_add.php';
    }

    public function articleAdd($params)
    {
        try {

            $articleToCreate = new ArticleViewModel($_POST);

            $this->articleService->createArticle($articleToCreate);

            $this->index();
        } catch (\mysqli_sql_exception $msqle) {
            error_log($msqle);
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }


    public function articleUpdateView(array $params)
    {
        if (is_numeric($params['id'])) {
            $id = intval($params['id']);
        } else {
            throw new InvalidArgumentException('Invalid ID. A numeric value is required to see an article');
        }
        $article = $this->articleService->getById($id);

        require __DIR__ . '/../Views/articles/article_update.php';
    }

    public function articleUpdate()
    {
        try {
            $articleToCreate = new ArticleViewModel($_POST);

            $this->articleService->updateArticle($articleToCreate);

            $this->index();
        } catch (\mysqli_sql_exception $msqle) {
            error_log($msqle);
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }

    public function articleDelete($params)
    {
        try {
            $id = null;

            if (!empty($params['id'])) {
                if (!is_numeric($params['id'])) {
                    throw new InvalidArgumentException('Invalid ID. A numeric value is required to edit a ticket');
                }
                $id = intval($params['id']);
            }

            $this->articleService->deleteArticle($id);

            $this->index();
        } catch (InvalidArgumentException $iae) {
            error_log($iae);
        } catch (\mysqli_sql_exception $msqle) {
            error_log($msqle);
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }
}
