<?php

namespace App\Policies;

use App\User;
use App\Models\Quote;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotesPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function VerifyQuote(){
        $user = auth()->user();

        $quote = Quote::where('user_id',$user->id)->first();

        if(isset($quote->id)){

            if(is_null($quote->first_session) || is_null($quote->second_session)){

                return true;
    
            }
    
            return false;

        }

        return true;

        
    }
}
