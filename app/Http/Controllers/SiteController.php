<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Traits\SendEmailsTrait;

class SiteController extends Controller
{
    use SendEmailsTrait;
    public function index(){
        
        $countries = Country::all();

        return view('welcome',[
            'countries'=>$countries,
        ]);
    }

    public function emails()
    {
        // $this->successPayment('devsignhost@gmail.com');
        return View('emails.successPayment');
    }

}
