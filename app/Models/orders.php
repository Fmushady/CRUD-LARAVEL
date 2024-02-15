<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $order_id
 * @property string $invoice_id
 * @property string $order_status
 * @property integer $order_total
 * @property integer $user_id
 * @property string $order_date
 */
class orders extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'order_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['invoice_id', 'order_status', 'order_total', 'user_id', 'order_date'];
}
