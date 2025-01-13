<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function login(Request $request){

        //validar nuestros datos
        $request->validate([
            'Email' => 'required|Email',
            'password' => 'required'
        ]);

        //buscar nuestro usuario por email
        $usuario = Usuario::where('Email',$request->Email)->first();

        //verificar si existe
        if (!$usuario || $usuario->password !== $request->password) {
            return response()->json([
                'message' => 'los datos son incorrectos'
            ], 401);
        }


        return response()->json(
            $usuario
        );




    }


    //php artisan serve --host=192.168.100.40 --port=8000

    public function getNameUsers()
    {
        $users = DB::select('select Nombre from usuarios');

        return response()->json($users);
    }



    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Nombre' => 'required',
            'Email' => 'required|Email',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $usuario = Usuario::create($request->all());


        if (!$usuario) {
            $data = [
                'message' => 'Error al crear la cuenta',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'Usuario' => $usuario,
            'status' => 201
        ];

        return response()->json($data, 201);
    }
}
