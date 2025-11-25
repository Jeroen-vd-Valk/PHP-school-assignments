<?php

namespace App\Repositories\Interfaces;


interface IGuestbookRepository
{
    public function getAll(): array;

    public function getById(int $id): array;

    public function createEntry(): void;

    public function deleteEntry(int $id): void;
}
