<?php

namespace App\Services\Interfaces;

use App\Models\Post;

interface IGuestbookService
{
    public function getAll(): array;
    public function createEntry(): void;
}
