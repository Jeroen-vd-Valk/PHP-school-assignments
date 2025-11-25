<?php

namespace App\Services;

use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\IUserService;

class UserService implements IUserService
{
    private IUserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function login(string $username, string $password): bool
    {
        $user = $this->repository->getUserByUsername($username);

        if ($user === null) {
            return false;
        } else {
            return password_verify($password, $user['password']);
        }
    }
}
