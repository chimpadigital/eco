<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class FinalizarController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();

        if(!$user->can('verifyPaymentApproved',PaymentMethod::class)){
            return redirect()->route('steps');
        }
        return View('finalizar.finalizar');
    }
}
