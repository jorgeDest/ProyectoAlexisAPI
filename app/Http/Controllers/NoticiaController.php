<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoticiaController extends Controller
{
    public function Noticia(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Titulo' => 'required',
            'Contenido' => 'required',
            'FechaPublicacion' => 'required',
            'CategoriaID' => 'required|exists:categorias,CategoriaID',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Errores de validación',
                'errors' => $validator->errors(),
            ], 401);
        }

        $noticia = Noticia::create($request->all());

        return response()->json([
            'message' => 'Noticia creada con éxito',
            'noticia' => $noticia,
        ], 201);


    }


}
