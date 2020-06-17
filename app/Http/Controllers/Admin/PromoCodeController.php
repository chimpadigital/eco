<?php

namespace App\Http\Controllers\Admin;
use App\Models\PromoCode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromoCodeController extends Controller
{
    public function index()
    {
        return View('admins.promocode.promocode');
    }

    public function listado(){
        $promos = PromoCode::select(
            'id',
            'code_name',
            'expiration_date',
            'amount',
            'quantity_applied',
            'state',
            )->get();
            return response()->json($promos);
    }

    public function store(Request $request)
    {
        $promos = $request->all();

        foreach($promos as $promo){
            PromoCode::updateOrCreate([
                'id' => $promo['id'],
            ],
            [
                'code_name' => $promo['code_name'],
                'expiration_date' => $promo['expiration_date'],
                'amount' => $promo['amount'],
                'quantity_applied' => $promo['quantity_applied'],
                'state' => $promo['state']
            ]);
        }
        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        PromoCode::whereId($request->id)->delete();
        return response()->json(['success' => true]);

    }
}
