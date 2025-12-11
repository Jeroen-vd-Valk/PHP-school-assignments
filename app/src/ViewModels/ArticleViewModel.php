<?php

namespace App\ViewModels;

use App\Models\ArticleModel;

class ArticleViewModel
{
    public ?int $id;
    public string $title;
    public string $content;
    public string $author;
    public ?string $datetime;

    public function __construct(array $data = [])
    {
        if (empty($data)) return;

        $this->id = isset($data['id']) && $data['id'] !== '' ? (int)$data['id'] : null;
        $this->title = $data['title'] ?? '';
        $this->content = $data['content'] ?? '';
        $this->author = $data['author'] ?? '';
        $this->datetime = $data['datetime'] ?? '';
    }

    public function validate(): void {}
}
