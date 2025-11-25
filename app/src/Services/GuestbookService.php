<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\GuestbookRepository;
use App\Repositories\Interfaces\IGuestbookRepository;
use App\Services\Interfaces\IGuestbookService;

class GuestbookService implements IGuestbookService
{

    private IGuestbookRepository $repository;

    public function __construct()
    {
        $this->repository = new GuestbookRepository();
    }

    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    public function createEntry(): void
    {
        $this->repository->createEntry();
    }
}
