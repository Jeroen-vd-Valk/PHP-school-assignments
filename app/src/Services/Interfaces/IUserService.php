<?php

namespace App\Services\Interfaces;


interface IUserService
{
    public function login(string $username, string $password): bool;
}
