<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DocumentProduct;

class DocumentService
{
    public function __construct(protected DocumentProductService $documentProductService, protected ProductService $productService)
    {}

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $productArticle = $data['article'];
        $productQuantity = $data['quantity'];

        $type = $data;
        unset($type['quantity'], $type['article']);

        $document = Document::create($type);
        $this->documentProductService->setProductsToDocument($productArticle, $productQuantity, $document->id);

        return $document->id;
    }

    /**
     * @param Document $document
     */
    public function approve(Document $document)
    {
        /** @var DocumentProduct $documentsProducts */
        foreach ($document->documentsProducts as $documentsProducts) {
            if ($document->type == Document::TYPE_EXPENDITURE) {
                $this->productService->deduct($documentsProducts->product_article, $documentsProducts->quantity);
            } else {
                $this->productService->add($documentsProducts->product_article, $documentsProducts->quantity);
            }
            $this->documentProductService->setRemnants($documentsProducts);
        }
        $document->approved_at = date('Y-m-d H:i:s');
        $document->save();
    }
}
