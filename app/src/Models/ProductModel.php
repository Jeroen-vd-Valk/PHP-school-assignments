<?php

namespace App\Models;

class ProductModel
{
    public int $id;
    public string $title;
    public float $price;
    public string $description;
    public string $category;
    public string $image;
    public float $ratingRate;
    public int $ratingCount;
}
