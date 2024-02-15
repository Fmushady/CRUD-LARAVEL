<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $order_item_id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $product_name
 * @property integer $product_price
 * @property integer $qty
 * @property integer $subtotal
 */
class order_items extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'order_item_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'product_id', 'product_name', 'product_price', 'qty', 'subtotal'];
}
