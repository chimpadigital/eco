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
        'promo_code_id',
    ];

    public function status_payment(){
        return $this->belongsTo('App\Models\StatusPayment');
    }

    public function promocode()
    {
        return $this->belongsTo(PromoCode::class,'promo_code_id','id');
    }
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
