<?php
namespace App\Repositories;

use App\Models\Products;

class ProductsRepository extends BaseRepository{
    public function __construct(Products $products)
    {
        parent::__construct($products);
    }
}