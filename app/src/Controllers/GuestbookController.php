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
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }

    public function getDetails($vars = [])
    {
        try {
            if (is_numeric($vars['id'])) {
                $id = intval($vars['id']);
            } else {
                throw new \InvalidArgumentException('Invalid ID. A numeric value is required to edit a ticket');
            }
            $post = $this->service->getById($id);

            var_dump($post);

            require __DIR__ . '/../Views/guestbookDetails.php';
        } catch (\InvalidArgumentException $e) {
            die('' . $e->getMessage());
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }

    public function getAllManagement()
    {
        try {
            $posts = $this->service->getAll();

            require __DIR__ . '/../Views/guestbookManagement.php';
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }

    public function createEntry()
    {
        try {
            $this->service->createEntry();

            $this->GetAll();
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }


    public function editEntry($vars = [])
    {
        try {
            if (is_numeric($vars['id'])) {
                $id = intval($vars['id']);
            } else {
                throw new \InvalidArgumentException('Invalid ID. A numeric value is required to edit a ticket');
            }
            var_dump($id);



            echo 'This works';
        } catch (\InvalidArgumentException $e) {
            die('' . $e->getMessage());
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }

    public function deleteEntry()
    {
        try {

            if (is_numeric($_POST['id'])) {
                $id = intval($_POST['id']);
            } else {
                throw new \InvalidArgumentException('Invalid ID. A numeric value is required to edit a ticket');
            }

            $this->service->deleteEntry($id);


            $this->getAllManagement();
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }
}
