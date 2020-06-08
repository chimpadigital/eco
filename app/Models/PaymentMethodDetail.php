<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'amount',
        'payment_method_id',
    ];
}
