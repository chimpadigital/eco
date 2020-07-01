<?php

namespace App\Http\Controllers;

use DateTime;

use Carbon\Carbon;
use App\Models\Quote;
use Illuminate\Http\Request;
use Auth;
use App\Traits\SendEmailsTrait;

class QuoteController extends Controller
{
    use SendEmailsTrait;

    public function index()
    {
        $user = auth()->user();

        if(!$user->can('VerifyQuote',Quote::class)){
            return redirect()->route('steps');
        }
        $reservas = Quote::all();
        return View('quotes.quotes',compact('reservas'));
    }

    public function consultarFecha(Request $request)
    {
        
        
        // return response()->json($fecha->format('Y-m-d H:i:s'));
        $horarios_disponibles = collect();
        // $quotes = Quote;
        $horarios = collect(
           [
            [
                'horario' => '10:00:00',
                'hora' => '10:00 am'
            ],
            [
                'horario' => '11:00:00',
                'hora' => '11:00 am'
            ],
            [
                'horario' => '12:00:00',
                'hora' => '12:00 pm'
            ],
            [
                'horario' => '13:00:00',
                'hora' => '13:00 pm'
            ],
            [
                'horario' => '14:00:00',
                'hora' => '14:00 pm'
            ]
           ]
           );

       if($request->date){
            $DiasSunSat = Carbon::createFromFormat('d-m-Y',$request->date);
            $user = Auth::user();
            $limiteFecha = $DiasSunSat->diffInDays($user->created_at);
            if($limiteFecha == 30){
                return response()->json([
                    'error' => true,
                    'errorText' => 'La reserva no puede ser mayor a los 30 Días'
                ]);
            }
            if($DiasSunSat->format('D') == 'Sun' || $DiasSunSat->format('D') == 'Sat'){
                return response()->json([
                    'error' => true,
                    'errorText' => 'No puedes reservar este Dia'
                ]);
            }
        $consulta_fecha = $request->date;
        foreach($horarios as $key  => $horario){
            
            $fecha = DateTime::createFromFormat('d-m-Y H:i:s', $consulta_fecha.' '.$horario['horario']);
            // return response()->json($fecha->format('Y-m-d H:i:s'));

            $quote = Quote::whereDate('first_session',$fecha->format('Y-m-d'))
                    ->whereTime('first_session',$horario['horario'])
                    ->orWhereDate('second_session',$fecha->format('Y-m-d'))
                    ->whereTime('second_session',$horario['horario'])
                    ->first();
            if(!$quote){
                $horarios_disponibles->push(['horario' => $horario['horario'],'hora' => $horario['hora']]);
            }
            
        }
        return response()->json([
            'horarios' => $horarios_disponibles,
            'error' => false,
        ]);
       }else{
        $DiasSunSat = Carbon::createFromFormat('d-m-Y',$request->second_date);
        $user = Auth::user();
        $limiteFecha = $DiasSunSat->diffInDays($user->created_at);
        if($limiteFecha == 30){
            return response()->json([
                'error' => true,
                'errorText' => 'La reserva no puede ser mayor a los 30 Días'
            ]);
        }
        if($DiasSunSat->format('D') == 'Sun' || $DiasSunSat->format('D') == 'Sat'){
            return response()->json([
                'error' => true,
                'errorText' => 'No puedes reservar este Dia'
            ]);
        }
        foreach($horarios as $key  => $horario){
        $consulta_fecha = $request->second_date;
            
            $fecha = DateTime::createFromFormat('d-m-Y H:i:s', $consulta_fecha.' '.$horario['horario']);
            // return response()->json($fecha->format('Y-m-d H:i:s'));

            $quote = Quote::whereDate('second_session',$fecha->format('Y-m-d'))
                    ->whereTime('second_session',$horario['horario'])
                    ->orWhereDate('first_session',$fecha->format('Y-m-d'))
                    ->whereTime('first_session',$horario['horario'])
                    ->first();
            if(!$quote){
                $horarios_disponibles->push(['horario' => $horario['horario'],'hora' => $horario['hora']]);
            }
        }
        return response()->json([
            'horarios' => $horarios_disponibles,
            'error' => false,
        ]);
       }

        
        
    }
    
    public function reservarFecha(Request $request)
    {
        $user = auth()->user();
        
        if(!$user->can('VerifyQuote',Quote::class)){
            return response()->json("access denied",403);
        }
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

    public function checkSession(Request $request)
    {   
        $user = auth()->user();
        $sessions = Quote::where('user_id',$user->id)->first();
        
        if($sessions){
            if($sessions->first_session != null && $sessions->second_session != null){
                $user = Auth::user();
                $this->sesionesReserved($user->email,$sessions);
                 return response()->json(['finish' => false]);
            }else{
             return response()->json(['finish' => false]);

            }
        }else{
            return response()->json(['finish' => false]);
        }
    }
}
