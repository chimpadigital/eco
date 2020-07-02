<?php

namespace App\Policies;

use App\Models\Survey;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurveyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function verifySurvey(){

        $user = auth()->user();
        $survey = Survey::where('user_id',$user->id)->first();

        if($survey){

            return false;

        }else { 

            return true;

        }

    }
}
