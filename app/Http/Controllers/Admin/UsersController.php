<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Traits\SendEmailsTrait;


use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class UsersController extends Controller
{
    use SendEmailsTrait;
    public function index()
    {
        return View('admins.users.users');
    }

    public function listUsers(Request $request)
    {
        
        $page = $request->page;
        if($request->typeFiltro == 1){
            $usersAll = User::email($request->search)
        ->get();
        }elseif($request->typeFiltro == 3){
            $usersAll = User::lastname($request->search)
            ->get();
        }else{
            $usersAll = User::phone($request->search)
        ->get();
        }

        $users = collect();
        foreach($usersAll as $key => $user){
               //procesando el cupon
                if(isset($user->invoice)){
                    // return $user->invoice->payment->promocode;
                    if($user->invoice->payment){
                        if($cupon = $user->invoice->payment->promocode){

                            $cupon = $user->invoice->payment->promocode->code_name;
                        }else{
                         $cupon = '';

                        }
                    }else{
                    $cupon = '';

                    }    
                }else{
                    $cupon = '';
                }
                ///end
            if($user->userInformation){
                $data = [
                    'id' => $user->id,
                    'nombre' => $user->name,
                    'apellido' => $user->lastname,
                    'email' => $user->email,
                    'telefono' => $user->phone,
                    'registro' => Carbon::parse($user->created_at)->format('d-m-Y'),
                    'pais' => $user->country->name,
                    'descuento' => $cupon,
                    'primerSesion' => isset($user->quote->first_session) ? $user->quote->first_session : "",
                    'segundaSesion' => isset($user->quote->second_session) ? $user->quote->second_session : "",
                    'ult_descarga' => isset($user->download) ? Carbon::parse($user->download->updated_at)->format('d-m-Y'): "",

                ];
            }else{
                $data = [
                    'id' => $user->id,
                    'nombre' => $user->name,
                    'apellido' => $user->lastname,
                    'email' => $user->email,
                    'telefono' => $user->phone,
                    'registro' => Carbon::parse($user->created_at)->format('d-m-Y'),
                    'pais' => isset($user->country) ? $user->country->name:'',
                    'descuento' => $cupon,
                    'primerSesion' => isset($user->quote->first_session) ? $user->quote->first_session : "",
                    'segundaSesion' => isset($user->quote->second_session) ? $user->quote->second_session : "",
                    'ult_descarga' => isset($user->download) ? Carbon::parse($user->download->updated_at)->format('d-m-Y'): "",

                    
                ];
            }
            
            $users->push($data);
        };

        $items = $users;
        $total = $users->count();
        $perPage = 10;
        $itemsPage = $items->forPage($page,$perPage);

        $paginateUsers = new LengthAwarePaginator(
            $itemsPage,
            $total,
            $perPage,
            $page
        );
        return [
            'pagination' => $paginateUsers,
            'users' => $paginateUsers
        ];
        return response()->json([
            'users' => $users,
        ]);
    }

    //Perfil

    public function perfil()
    {
        return View('admins.users.perfil');
    }

    public function inforPerfil(Request $request){
        // return $request->id;
        $user = User::whereId($request->id)->first();
        /* Fecha Sessiones */
        $fecha_sesion_1 = isset($user->quote->second_session) ?  Carbon::createFromFormat('Y-m-d H:i:s',$user->quote->first_session)->format('d-m-Y H:i') : "";
        $fecha_sesion_2 = isset($user->quote->second_session) ?  Carbon::createFromFormat('Y-m-d H:i:s',$user->quote->second_session)->format('d-m-Y H:i') : "";

        //end 
        //Controlador de descargar
            $descarga = $user->download;
            if($descarga){
                if($descarga->element_1 && $descarga->element_2 && $descarga->element_3 && $descarga->element_4 ){
                    $descargarManuales = true; 
                 }else{
                     $descargarManuales = false;
                 }
            }else{
                $descargarManuales = false;
            }
        //end
        //procesando el cupon
        if(isset($user->invoice)){
            if($user->invoice->payment->promocode){
                $cupon = $user->invoice->payment->promocode->code_name;
            }else{
            $cupon = '';

            }    
        }else{
            $cupon = '';
        }
        ///end
        //procesando el pago
        if(isset($user->invoice)){
            if($user->invoice->payment->payment_method_id == 1)
            {
                $metho = $user->invoice->payment->payment_method->name;
                $ref = $user->invoice->payment->external_reference;

            } 
            if($user->invoice->payment->payment_method_id == 2){
               $metho = $user->invoice->payment->payment_method->name;
                $ref = $user->invoice->payment->payment_id;
            }
               
        }else{
            $metho = '';
            $ref = '';
        }
        ///end
        $jsonFormate = [
            'procesoSesion'=> [
                'pago' => isset($user->invoice)?true:false,
                'method' => $metho,
                'ref' => $ref,
                'descargar' => $descargarManuales,
                'descuento' => false,

                'primerSesionFecha' => $fecha_sesion_1,
                'primerSesion' => isset($user->quote->first_session_assistance) ? $user->quote->first_session_assistance : "",

                'segunSesionFecha' => $fecha_sesion_2,
                'segunSesion' => isset($user->quote->second_session_assistance) ? $user->quote->second_session_assistance : "",

                'condicionesGenerales' => true,
                'acuerdoConfidencialidad' => true,

                'cupon' => $cupon
            ],
            'inforPerfil' => [
                'id' => $user->id,
                'nombre' => $user->name,
                'apellido' => $user->lastname,
                'email' => $user->email,
                'telefono' =>$user->phone,
                'fechaNacimiento' => $user->birth_date,
                'ciudad' => $user->city,
                'pais' => $user->country_id,
                'ocupacion' => $user->userInformation == null ? '': $user->userInformation->occupation,
            ],
            'redes' => [
                'facebook' => $user->userInformation == null ? '': $user->userInformation->facebook,
                'linkedin' => $user->userInformation == null ? '': $user->userInformation->linkedin,
                'instagram' => $user->userInformation == null ? '': $user->userInformation->instagram,
                'otras' => $user->userInformation == null ? '': $user->userInformation->others
            ],
            'sobreFundacion' => [
                'motivacion' =>$user->userInformation == null ? '': $user->userInformation->motivation,
                'conociasFundacion' =>$user->userInformation == null ? '': $user->userInformation->did_you_know_foundation,
            ],
            'otraInfo' => [
                'ong' =>$user->userInformation == null ? '': $user->userInformation->ong,
                'nombreOgn' =>$user->userInformation == null ? '': $user->userInformation->name_ogn,
                'paginaWeb' =>$user->userInformation == null ? '': $user->userInformation->web_page,
                'aliadosParaImplementar' =>$user->userInformation == null ? '': $user->userInformation->allies_to_implement,
                'ImplementacionAnt' =>$user->userInformation == null ? '': boolval($user->userInformation->implementation_ant),
                'ImplementacionName' =>$user->userInformation == null ? '': $user->userInformation->implementation_name,
            ],
            'cladeDeInpacto' =>$user->userInformation == null ? '': $user->userInformation->impact_class,
            'informacionExtra' =>$user->userInformation == null ? '': $user->userInformation->extra_information,
            'encuestaUser' => [
                'how_did_you_know_manual' => isset($user->survey)?$user->survey->how_did_you_know_manual:'',
                'process_download' => isset($user->survey)?$user->survey->process_download:'',
                'virtual_assists_boolean' => isset($user->survey)?$user->survey->virtual_assists_boolean:'',
                'virtual_assists' => isset($user->survey)?$user->survey->virtual_assists:'',
                'call_time_boolean' => isset($user->survey)?$user->survey->call_time_boolean:'',
                'call_time' => isset($user->survey)?$user->survey->call_time:'',
                'quality_advice_boolean' => isset($user->survey)?$user->survey->quality_advice_boolean:'',
                'quality_advice' => isset($user->survey)?$user->survey->quality_advice:'',
                'attention' => isset($user->survey)?$user->survey->attention:'',
                'suggestions' => isset($user->survey)?$user->survey->suggestions:'',
                //Content
                'content_option_1' => isset($user->survey)?$user->survey->content_option_1:'',
                'content_option_2' => isset($user->survey)?$user->survey->content_option_2:'',
                'content_option_3' => isset($user->survey)?$user->survey->content_option_3:'',
                'content_option_4' => isset($user->survey)?$user->survey->content_option_4:'',
                'content_option_5' => isset($user->survey)?$user->survey->content_option_5:'',
                'content_option_6' => isset($user->survey)?$user->survey->content_option_6:'',
                //chapters
                'chapter_1' => isset($user->survey)?$user->survey->chapter_1:'',
                'chapter_2' => isset($user->survey)?$user->survey->chapter_2:'',
                'chapter_3' => isset($user->survey)?$user->survey->chapter_3:'',
                'chapter_4' => isset($user->survey)?$user->survey->chapter_4:'',
                'chapter_5' => isset($user->survey)?$user->survey->chapter_5:'',
                'chapter_6' => isset($user->survey)?$user->survey->chapter_6:'',
                'chapter_7' => isset($user->survey)?$user->survey->chapter_7:'',
                'chapter_8' => isset($user->survey)?$user->survey->chapter_8:'',
                //assessment
                'satisfied' => isset($user->survey)?$user->survey->satisfied:'',
                'suggestions_2' => isset($user->survey)?$user->survey->suggestions_2:'',
                'would_you_recommend' => isset($user->survey)?$user->survey->would_you_recommend:'',
                'like' => isset($user->survey)?$user->survey->like:'',
            ]

        ];

        return response()->json($jsonFormate,200);
    }

    public function updateInforPerfil(Request $request)
    {
        //Actualizando el Usuario

        
        User::whereId($request->id)->update([
            'name' => $request->data['inforPerfil']['nombre'],
            'lastname' => $request->data['inforPerfil']['apellido'],
            'email' => $request->data['inforPerfil']['email'],
            'phone' => $request->data['inforPerfil']['telefono'],
            'city' =>       $request->data['inforPerfil']['ciudad'],
            'country_id' =>    $request->data['inforPerfil']['pais'],
            'birth_date' => $request->data['inforPerfil']['fechaNacimiento'],

        ]);

        $user = User::whereId($request->id)->first();
        $user->userInformation()->updateOrCreate([
            'user_id' => $user->id,
        ],[
            // otraInfo
            'occupation' => $request->data['inforPerfil']['ocupacion'],
            'facebook' =>   $request->data['redes']['facebook'],
            'linkedin' =>   $request->data['redes']['linkedin'],
            'instagram' =>  $request->data['redes']['instagram'],
            'others' =>     $request->data['redes']['otras'],
            'motivation' => $request->data['sobreFundacion']['motivacion'],
            'did_you_know_foundation' => $request->data['sobreFundacion']['conociasFundacion'],
            'ong' => $request->data['otraInfo']['ong'],
            'name_ogn' => $request->data['otraInfo']['nombreOgn'],
            'web_page' => $request->data['otraInfo']['paginaWeb'],
            'allies_to_implement' => $request->data['otraInfo']['aliadosParaImplementar'],
            'implementation_ant' => $request->data['otraInfo']['ImplementacionAnt'],
            'implementation_name' => $request->data['otraInfo']['ImplementacionName'],
            'impact_class' => $request->data['cladeDeInpacto'],
            'extra_information' => $request->data['informacionExtra'],
        ]);


        if($user->quote){
            $user->quote()->updateOrCreate([
            
                'user_id' => $user->id,
                ],
                [
                    'first_session_assistance' => $request->data['procesoSesion']['primerSesion'],
                    'second_session_assistance' => $request->data['procesoSesion']['segunSesion'],
    
                ]);
    
                if($request->data['procesoSesion']['segunSesion']){
    
                    $this->finishedSessions($user->email);
                }
        }


        return response()->json(['success' => true]);
    }

    public function countries()
    {
        return Country::select('id','name')->get();
    }

    public function DeleteUser(Request $request)
    {
        User::whereId($request->id)->delete();
        return response()->json(['success' => true],200);



    }
}
