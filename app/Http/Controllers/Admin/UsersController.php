<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return View('admins.users.users');
    }

    public function perfil()
    {
        return View('admins.users.perfil');
    }

    public function inforPerfil(){
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
                'nombre' => 'maria',
                'apellido' => 'matinez',
                'email' => 'maria@vue.com',
                'telefono' => '000000000',

                'fechaNacimiento' => '01/05/2020',
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
}
