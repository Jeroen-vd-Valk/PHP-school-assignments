<?php

namespace App\Repositories\Interfaces;

use App\Models\Post;

interface IGuestbookRepository
{
    public function getAll(): array;
    public function createEntry(): void;
}
