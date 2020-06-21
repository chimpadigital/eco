<?php

namespace App\Policies;

use App\User;
use App\Models\UserInformation;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserInformationPolicy
{
    use HandlesAuthorization;

   public function verifyUserInformation(User $user){

        if(UserInformation::where('user_id',$user->id)->first()){
            return false;
        } 

        return true;

   }
}
