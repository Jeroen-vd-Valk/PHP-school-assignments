<?php

namespace App\ViewModels;

use App\Models\ProductModel;

class ProductViewModel
{

    /** @var ProductModel $product */
    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }
}
