<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);

    }
}
