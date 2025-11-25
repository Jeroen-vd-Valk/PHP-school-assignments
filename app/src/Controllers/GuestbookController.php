<?php

namespace App\Controllers;

use App\Config;
use App\Services\GuestbookService;
use App\Services\Interfaces\IGuestbookService;
use App\Models\Post;

class GuestbookController
{
    private IGuestbookService $service;

    public function __construct()
    {
        $this->service = new GuestbookService();
    }

    # DO NOT DO THIS, THIS IS UGLY, BAD AND WRONG
    public function getAll()
    {
        try {
            $posts = $this->service->getAll();

            require __DIR__ . '/../Views/guestbook.php';
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function getAllManagement()
    {
        try {
            $posts = $this->service->getAll();

            require __DIR__ . '/../Views/guestbookManagement.php';
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function createEntry()
    {
        try {
            $this->service->createEntry();

            $this->GetAll();
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}
