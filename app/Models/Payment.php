<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_id',
        'payment_method_id',
        'status_payment_id',
        'invoice_id',
        'order_id',
        'external_reference',
    ];
}