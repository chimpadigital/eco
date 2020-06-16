<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return View('admins.users.users');
    }

    public function listUsers(Request $request)
    {
        $usersAll = User::all();
        $users = collect();
        foreach($usersAll as $key => $user){
            if($user->userInformation){
                $data = [
                    'id' => $user->id,
                    'nombre' => $user->name,
                    'apellido' => $user->lastname,
                    'email' => $user->email,
                    'telefono' => '000000',
                    'pais' => 'VE',
                    'descuento' => 'DESCUENTO',
                    'primerSesion' => 'fechas',
                    'segundaSesion' => 'fechas',
                ];
            }else{
                $data = [
                    'id' => $user->id,
                    'nombre' => $user->name,
                    'apellido' => $user->lastname,
                    'email' => $user->email,
                    'telefono' => '',
                    'pais' => '',
                    'descuento' => '',
                    'primerSesion' => '',
                    'segundaSesion' => '',
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
        $jsonFormate = [
            'procesoSesion'=> [
                'pago' => true,
                'descuento' => false,

                'primerSesionFecha' => '02/05/2020',
                'primerSesion' => true,

                'segunSesionFecha' => '02/05/2020',
                'segunSesion' => false,

                'condicionesGenerales' => true,
                'acuerdoConfidencialidad' => true,
            ],
            'inforPerfil' => [
                'id' => $user->id,
                'nombre' => $user->name,
                'apellido' => $user->lastname,
                'email' => $user->email,
                'telefono' => '',

                'fechaNacimiento' => '',
                'ciudad' => 'Cordoba',
                'pais' => 'Argenitina',
                'ocupacion' => 'Gerente de ventas',
            ],
            'redes' => [
                'facebook' => 'Facebook',
                'linkedin' => 'Linkedin',
                'instagram' => 'Instagram',
                'otras' => 'Otras'
            ],
            'sobreFundacion' => [
                'motivacion' => 'Personal',
                'conociasFundacion' => 'no'
            ],
            'otraInfo' => [
                'ong' => true,
                'nombreOgn' => 'Nombre',
                'paginaWeb' => '',
                'aliadosParaImplementar' => 'definición',
                'ImplementacionAnt' => true,
                'ImplementacionName' => 'Desarrollo'
            ],
            'cladeDeInpacto' => '' ,
            'informacionExtra' => '',

        ];

        return response()->json($jsonFormate,200);
    }

    public function updateInforPerfil(Request $request)
    {
        //Actualizando el Usuario

        
        $user = User::whereId($request->id)->update([
            'name' => $request->data['inforPerfil']['nombre'],
            'lastname' => $request->data['inforPerfil']['apellido'],
            'email' => $request->data['inforPerfil']['email']
        ]);
        
        return 'success';
    }
}
