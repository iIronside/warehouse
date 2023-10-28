<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 * @property string $product_article
 * @property int $quantity
 * @property int $remnants
 * @property int $documents_id
 *
 * @property Product $product
 */
class DocumentProduct extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'documents_products';

    /**
     * @var string[]
     */
    protected $fillable = ['product_article', 'quantity', 'remnants', 'documents_id'];

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'article', 'product_article');
    }
}
