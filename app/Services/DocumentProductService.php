<?php

namespace App\Services;

use App\Models\DocumentProduct;

class DocumentProductService
{
    public function __construct(protected ProductService $productService)
    {}

    /**
     * @param $productArticle
     * @param $productQuantity
     * @param $documentId
     */
    public function setProductsToDocument($productArticle, $productQuantity, $documentId)
    {
        foreach($productArticle as $index => $article ) {
            $product = $this->productService->getProduct($article);

            DocumentProduct::create([
                'article' => $article,
                'quantity' => $productQuantity[$index],
                'remnants' => $product->quantity,
                'documents_id' => $documentId,
                'product_article' => $product->article
            ]);
        }
    }

    /**
     * @param DocumentProduct $documentProduct
     */
    public function setRemnants(DocumentProduct $documentProduct)
    {
        $product = $this->productService->getProduct($documentProduct->product_article);
        $documentProduct->remnants = $product->quantity;
        $documentProduct->save();
    }
}
