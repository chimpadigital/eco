<?php

namespace App\Http\Controllers;

use DateTime;

use Carbon\Carbon;
use App\Models\Quote;
use Illuminate\Http\Request;
use Auth;

class QuoteController extends Controller
{
    public function index()
    {
        return View('quotes.quotes');
    }

    public function consultarFecha(Request $request)
    {
       
        $consulta_fecha = $request->date;
        // return response()->json($fecha->format('Y-m-d H:i:s'));
        $horarios_disponibles = collect();
        // $quotes = Quote;
        $horarios = collect([
            '10:00:00',
            '11:00:00',
            '12:00:00',
            '13:00:00',
            '14:00:00',
        ]);

        foreach($horarios as $key  => $horario){
            
            $fecha = DateTime::createFromFormat('d-m-Y H:i:s', $consulta_fecha.' '.$horario);
            // return response()->json($fecha->format('Y-m-d H:i:s'));

            $quote = Quote::whereDate('first_session',$fecha->format('Y-m-d'))
                    ->whereTime('first_session',$horario)
                    ->first();
            if(!$quote){
                $horarios_disponibles->push(['horario' => $horario]);
            }
        }

        
        return response()->json($horarios_disponibles);
    }
    
    public function reservarFecha(Request $request)
    {
        $userAuth =  Auth::user();

        if ($request->fecha) {
            $fecha_reserva = Carbon::createFromFormat('d-m-Y H:i:s',$request->fecha)->format('Y-m-d H:i:s');
            Quote::updateOrCreate(['user_id' => $userAuth->id],[
                'first_session' => $fecha_reserva,
                
            ]);
        }else{
            $fecha_reserva = Carbon::createFromFormat('d-m-Y H:i:s',$request->segunda_fecha)->format('Y-m-d H:i:s');
            Quote::updateOrCreate(['user_id' => $userAuth->id],[
                'second_session' => $fecha_reserva,
                
            ]);
        }
       
        return response()->json(['success' => true]);
    }
}
