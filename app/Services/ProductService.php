<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * @param $article
     * @return mixed
     */
    public function getProduct($article)
    {
        return Product::where('article', $article)->first();
    }

    /**
     * @param $article
     * @param $quantity
     */
    public function deduct($article, $quantity)
    {
        $product = self::getProduct($article);

        $product->quantity -= $quantity;
        $product->save();
    }

    /**
     * @param $article
     * @param $quantity
     */
    public function add($article, $quantity)
    {
        $product = self::getProduct($article);

        $product->quantity += $quantity;
        $product->save();
    }
}
