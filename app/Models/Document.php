<?php

namespace App\Models;

use Faker\Provider\zh_TW\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 * @property int $type
 * @property DateTime $approved_at
 *
 * @property DocumentProduct $documentsProducts
 */
class Document extends Model
{
    use HasFactory;

    const TYPE_EXPENDITURE = 10;
    const TYPE_RECEIPT = 20;

    /**
     * @return string[]
     */
    public static function typeList()
    {
        return [
            self::TYPE_EXPENDITURE => 'expenditure',
            self::TYPE_RECEIPT => 'receipt',
        ];
    }

    /**
     * @var string
     */
    protected $table = 'documents';

    /**
     * @var string[]
     */
    protected $fillable = ['type', 'approved_at'];

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function documentsProducts()
    {
        return $this->hasMany(DocumentProduct::class, 'documents_id', 'id');
    }
}
