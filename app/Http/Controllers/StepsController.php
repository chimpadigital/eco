<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StepsController extends Controller
{
    public function stepRouter(){

        return $this->step1();

    }

    public function step1(){

        return redirect()->route('payment.methods');
    
    }

    public function step2(){
        
    }

    public function step3(){
        
    }

    public function step4(){
        
    }
}
