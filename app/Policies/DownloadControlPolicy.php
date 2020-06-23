<?php

namespace App\Policies;


use App\User;
use App\Models\DownloadControl;
use Illuminate\Auth\Access\HandlesAuthorization;

class DownloadControlPolicy
{
    use HandlesAuthorization;

    public function verifyDownloads(User $user){

        $download = DownloadControl::where('user_id',$user->id)
        ->first();

        if(!$download){
            return true;
        }

        if($download->element_1 && $download->element_2 && $download->element_3 && $download->element_4){
            return false;
        }else {

            return true;

        }

    }
}
