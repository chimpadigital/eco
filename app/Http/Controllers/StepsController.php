<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class StepsController extends Controller
{
    public function stepRouter(){

        $user = auth()->user();
        if($user->can('verifyPayment',PaymentMethod::class))
        {
            return $this->step1();
            
        }elseif (true) {

            return $this->step2();
        }

    }

    public function step1(){

        return redirect()->route('payment.methods');
    
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
        
    }

    public function step4(){
        
    }
}
