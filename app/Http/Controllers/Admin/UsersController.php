<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class UsersController extends Controller
{
    public function index()
    {
        return View('admins.users.users');
    }

    public function listUsers(Request $request)
    {
        $usersAll = User::where('id','!=',1)->get();
        $users = collect();
        foreach($usersAll as $key => $user){
            if($user->userInformation){
                $data = [
                    'id' => $user->id,
                    'nombre' => $user->name,
                    'apellido' => $user->lastname,
                    'email' => $user->email,
                    'telefono' => $user->userInformation->phone,
                    'pais' => 'VE',
                    'descuento' => 'DESCUENTO',
                    'primerSesion' => $user->quote->first_session,
                    'segundaSesion' => $user->quote->second_session,
                ];
            }else{
                $data = [
                    'id' => $user->id,
                    'nombre' => $user->name,
                    'apellido' => $user->lastname,
                    'email' => $user->email,
                    'telefono' => '00',
                    'pais' => '',
                    'descuento' => '',
                    'primerSesion' => $user->quote->first_session,
                    'segundaSesion' => $user->quote->second_session,
                ];
            }
            
            $users->push($data);
        };
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
        $fecha_sesion_1 = Carbon::createFromFormat('Y-m-d H:i:s',$user->quote->first_session)->format('Y-m-d');
        $fecha_sesion_2 = Carbon::createFromFormat('Y-m-d H:i:s',$user->quote->second_session)->format('Y-m-d');

        //end 
        $jsonFormate = [
            'procesoSesion'=> [
                'pago' => true,
                'descuento' => false,

                'primerSesionFecha' => $fecha_sesion_1,
                'primerSesion' => true,

                'segunSesionFecha' => $fecha_sesion_2,
                'segunSesion' => false,

                'condicionesGenerales' => true,
                'acuerdoConfidencialidad' => true,
            ],
            'inforPerfil' => [
                'id' => $user->id,
                'nombre' => $user->name,
                'apellido' => $user->lastname,
                'email' => $user->email,
                'telefono' => $user->userInformation == null ? '': $user->userInformation->phone,
                'fechaNacimiento' => $user->userInformation == null ? '': $user->userInformation->birth_date,
                'ciudad' => $user->userInformation == null ? '': $user->userInformation->city,
                'pais' => $user->userInformation == null ? '': $user->userInformation->country,
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
                'ImplementacionAnt' =>$user->userInformation == null ? '': $user->userInformation->implementation_ant,
                'ImplementacionName' =>$user->userInformation == null ? '': $user->userInformation->implementation_name,
            ],
            'cladeDeInpacto' =>$user->userInformation == null ? '': $user->userInformation->impact_class,
            'informacionExtra' =>$user->userInformation == null ? '': $user->userInformation->extra_information,

        ];

        return response()->json($jsonFormate,200);
    }

    public function updateInforPerfil(Request $request)
    {
        //Actualizando el Usuario

        
        User::whereId($request->id)->update([
            'name' => $request->data['inforPerfil']['nombre'],
            'lastname' => $request->data['inforPerfil']['apellido'],
            'email' => $request->data['inforPerfil']['email']
        ]);

        $user = User::whereId($request->id)->first();
        $user->userInformation()->updateOrCreate([
            'id' => 1,
        ],[
        
        
            // otraInfo
        
            'phone' => $request->data['inforPerfil']['telefono'],
            'birth_date' => $request->data['inforPerfil']['fechaNacimiento'],
            'city' =>       $request->data['inforPerfil']['ciudad'],
            'country' =>    $request->data['inforPerfil']['pais'],
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
        ]
        );
        return response()->json(['success' => true]);
    }

    public function DeleteUser(Request $request)
    {
        User::whereId($request->id)->delete();
        return response()->json(['success' => true],200);



    }
}
