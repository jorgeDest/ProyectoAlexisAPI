<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Noticia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function categoria(Request $request)
    {

        $categoria = Categoria::all();



        return response()->json($categoria);
    }

    public function createCategoria(Request $request){
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required',


        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $usuario = Categoria::create($request->all());

        $data = [
            'Usuario' => $usuario,
            'status' => 201
        ];

        return response()->json($data, 201);

    }




}
