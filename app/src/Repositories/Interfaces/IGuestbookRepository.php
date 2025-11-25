<?php

namespace App\Repositories\Interfaces;

use App\Models\Post;

interface IGuestbookRepository
{
    public function getAll(): array;

    public function getById(int $id): array;

    public function createEntry(): void;

    public function deleteEntry(int $id): void;
}
