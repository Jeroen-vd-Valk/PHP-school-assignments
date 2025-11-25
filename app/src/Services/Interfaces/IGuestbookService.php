<?php

namespace App\Services\Interfaces;

use App\Models\Post;

interface IGuestbookService
{
    public function getAll(): array;

    public function getById(int $id): array;

    public function createEntry(): void;

    public function deleteEntry(int $id): void;
}
