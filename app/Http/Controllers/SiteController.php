<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        
        $countries = Country::all();

        return view('welcome',[
            'countries'=>$countries,
        ]);
    }
}