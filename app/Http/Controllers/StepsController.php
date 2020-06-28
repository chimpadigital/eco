<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\DownloadControl;
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
        
        } elseif ($user->can('verifyDownloads',DownloadControl::class)){

            return $this->step3();
        
        } else { 
            return redirect()->route('quotes');
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

        $downloadControl = DownloadControl::where('user_id',auth()->user()->id)
            ->firstOrCreate([
                'user_id'=>auth()->user()->id,
            ]);
        
        return view('steps.step3',[
            'downloadControl'=>$downloadControl,
        ]);
    
    }

    public function step4(){
        
    }


    public function verifyStep($step){
        
        $user = auth()->user();

        switch ($step) {
            case 3:
                if(!$user->can('verifyDownloads',DownloadControl::class)){
                
                    return response()->json(false,200);
                
                } else {
                
                    return response()->json(false,403);
                
                }
                break;
            
            default:
                # code...
                break;
        }


    }
}
