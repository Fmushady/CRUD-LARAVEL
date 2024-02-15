<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $product_id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property integer $price
 * @property integer $weight
 * @property string $img_url
 * @property Category $category
 * @property Category $category
 */
class products extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'product_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'name', 'description', 'status', 'price', 'weight', 'img_url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', null, 'category_id');
    }

    
}
