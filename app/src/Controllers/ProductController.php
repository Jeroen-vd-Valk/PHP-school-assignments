<?php

namespace App\Controllers;

use App\ViewModels\ProductViewModel;
use App\ViewModels\ProductsViewModel;

class ProductController
{
    public function index()
    {
        // For this exercise, we will load products from a local JSON file.
        $productsJson = file_get_contents(__DIR__ . '/../data/products.json');
        $products = json_decode($productsJson, false, 512, JSON_THROW_ON_ERROR);

        $vm = new ProductsViewModel($products);
        require __DIR__ . '/../Views/product/index.php';
    }

    public function get($params)
    {
        // For this exercise, we will load a product from a local JSON file.
        $productJson = file_get_contents(__DIR__ . '/../data/product.json');
        $product = json_decode($productJson, false, 512, JSON_THROW_ON_ERROR);
        $product->id = $params['id'];

        $vm = new ProductViewModel($product);
        require __DIR__ . '/../Views/product/get.php';
    }
}
