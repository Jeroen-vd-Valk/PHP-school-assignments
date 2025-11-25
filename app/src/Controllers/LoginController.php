<?php

namespace App\Controllers;

use App\Services\Interfaces\IUserService;
use App\Services\UserService;
use App\Controllers\GuestbookController;

class LoginController
{
    private IUserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function loginScreen()
    {
        require __DIR__ . '/../Views/login.php';
    }

    public function login()
    {
        session_start();
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if ($this->service->login($username, $password)) {
            $_SESSION['user'] = [
                'username' => $username,
                'password' => $password
            ];

            $_SESSION['success'] = 'You have succenfully logged in';
            $this->loginScreen();
        } else {
            $_SESSION['error'] = 'Incorrect username or password';
            $this->loginScreen();
        }
    }
}
