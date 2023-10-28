<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 * @property string $title
 * @property string $article
 * @property int $quantity
 * @property int $price
 * @property DateTime $deleted_at
 *
 * @property Product $product
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var bool
     */
    protected $guarded = false;
}
