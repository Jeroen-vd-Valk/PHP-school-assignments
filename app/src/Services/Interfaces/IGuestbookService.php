<?php

namespace App\Services\Interfaces;


interface IGuestbookService
{
    public function getAll(): array;

    public function getById(int $id): array;

    public function createEntry(): void;

    public function deleteEntry(int $id): void;
}
