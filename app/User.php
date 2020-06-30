<?php

namespace App;

use App\Models\Quote;
use App\Models\Invoice;
use App\Models\DownloadControl;
use App\Models\UserInformation;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Country;


class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country_id', 'city', 'lastname', 'phone', 'birth_date',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Relaciones
    public function userInformation()
    {
        return $this->hasOne(UserInformation::class);
    }

    public function quote()
    {
        return $this->hasOne(Quote::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function download()
    {
        return $this->hasOne(DownloadControl::class);
    }

    
    public function country()
    {
        return $this->belongsTo(Country::class);

    }

   
     
    //Scope
    public function scopeEmail($q,$value){
        if(isset($value)){
            $q->where('email','LIKE','%'.$value.'%');
        }

    }

    public function scopeLastname($q,$value){
        if(isset($value)){
            $q->where('lastname','LIKE','%'.$value.'%');
        }

    }

    public function scopePhone($q,$value){
        if(isset($value)){
            $q->whereHas('userInformation',function($query) use ($value){
                return $query->where('phone','LIKE','%'.$value.'%');
            });
        }

    }
}
