<?php

namespace App\Repositories\Interfaces;


interface IUserRepository
{
    public function getUserByUsername(string $username): ?array;
}
