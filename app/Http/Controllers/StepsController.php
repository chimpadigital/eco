<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\UserInformation;

class StepsController extends Controller
{
    public function stepRouter(){

        $user = auth()->user();
        
        if($user->can('verifyPayment',PaymentMethod::class))
        {
            return $this->step1();
            
        }elseif ($user->can('verifyUserInformation',UserInformation::class)) {

            return $this->step2();
        
        } elseif (true){

            return $this->step3();
        
        }

    }

    public function step1(){

        $user = auth()->user();

        $this->authorize('verifyUserInformation',UserInformation::class);

        return redirect()->route('payment.methods',[
            'user'=>$user,
        ]);
    
    }

    public function step2(){
        
        $countries = Country::all();

        $user = auth()->user();

        return view('steps.step2',[
            'countries'=>$countries,
            'user'=>$user,
        ]);

    }

    public function step3(){

        return view('steps.step3');
    
    }

    public function step4(){
        
    }
}
