<?php

namespace App\Controllers;

use App\Services\GuestbookService;
use App\Services\Interfaces\IGuestbookService;

class GuestbookController
{
    private IGuestbookService $service;

    public function __construct()
    {
        if (session_status() !== 2) session_start();

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
            if (!empty($_SESSION['user'])) {

                $posts = $this->service->getAll();

                require __DIR__ . '/../Views/guestbookManagement.php';
            } else {
                $_SESSION['error'] = 'You do not have management access, please log in first';
                $this->getAll();
            }
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
            if (!empty($_SESSION['user'])) {
                if (is_numeric($vars['id'])) {
                    $id = intval($vars['id']);
                } else {
                    throw new \InvalidArgumentException('Invalid ID. A numeric value is required to edit a ticket');
                }
            } else {
                $_SESSION['error'] = 'You do not have management access, please log in first';
                $this->getAll();
            }

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
            if (!empty($_SESSION['user'])) {
                if (is_numeric($_POST['id'])) {
                    $id = intval($_POST['id']);
                } else {
                    throw new \InvalidArgumentException('Invalid ID. A numeric value is required to edit a ticket');
                }

                $this->service->deleteEntry($id);

                $this->getAllManagement();
            } else {
                $_SESSION['error'] = 'You do not have management access, please log in first';
                $this->getAll();
            }
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            die('Unknown exception occurred: ' . $e->getMessage());
        }
    }
}
