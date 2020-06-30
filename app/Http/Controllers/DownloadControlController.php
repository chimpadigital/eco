<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\DownloadControl;
use App\Traits\SendEmailsTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DownloadControlController extends Controller
{
    use SendEmailsTrait;
    
    public $userAuth;

    public $downloadControl;

    public function __construct(){
        
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            
            $this->userAuth = Auth::user();

            $this->downloadControl = DownloadControl::where('user_id',$this->userAuth->id)
            ->firstOrCreate([
                'user_id'=>$this->userAuth->id,
            ]);

            return $next($request);
        });
    
    }

    public function download(Request $request,$id){

        $invoice = Invoice::with('payment.status_payment')
        ->where('user_id',$this->userAuth->id)
        ->latest()
        ->first();

        if( isset($invoice->payment->status_payment->name) ){

            if($invoice->payment->status_payment->name == "approved"){
            
                switch ($id) {
                    case 1:
                        if($this->downloadControl->element_1 != true){
                            return Storage::disk('local')->download('downloads/google.deb');
                        }
                        break;
                    case 2:
                        if($this->downloadControl->element_2 != true){
                            return Storage::disk('local')->download('downloads/google.deb');
                        }
                        break;
                    case 3:
                        if($this->downloadControl->element_3 != true){
                            return Storage::disk('local')->download('downloads/google.deb');
                        }
                        break;
                    case 4:
                        if($this->downloadControl->element_4 != true){
                            return Storage::disk('local')->download('downloads/google.deb');
                        }
                        break;
                    
                    default:
                        return response()->json([],403);
        
                        break;
                }
            
            }

        }

        return response()->json([],403);

    }

    public function notification(Request $request,$id){

        switch ($id) {
            case 1:
                
                $this->downloadControl->update([
                    'element_1'=>true,
                ]);

                $this->downloadManual($this->userAuth->email);
                
                return response()->json([],200);
                break;
            case 2:
                $this->downloadControl->update([
                    'element_2'=>true,
                ]);
                return response()->json([],200);
                break;
            case 3:
                $this->downloadControl->update([
                    'element_3'=>true,
                ]);
                return response()->json([],200);
                break;
            case 4:
                $this->downloadControl->update([
                    'element_4'=>true,
                ]);
                return response()->json([],200);
                break;
            
            default:
                return response()->json([],200);

                break;
        }

        return response()->json([],200);

    }

    
}
