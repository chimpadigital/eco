<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'total', 'user_id',
    ];

    public function payment(){

        return $this->hasOne('App\Models\Payment')->latest();
    
    }
}
