<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Noticia;
use App\Models\Usuario;
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
            'Nombre' => 'required',  // Solo se requiere el nombre, no la validación con 'exists'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Errores de validación',
                'errors' => $validator->errors(),
            ], 401);
        }

        $usuario = Usuario::where('Nombre', $request->Nombre)->first();

        if (!$usuario) {
            return response()->json([
                'message' => 'Usuario no encontrado',
            ], 404);
        }

        // Crear la noticia con el UsuarioID encontrado
        $noticia = new Noticia();
        $noticia->Titulo = $request->Titulo;
        $noticia->Contenido = $request->Contenido;
        $noticia->FechaPublicacion = $request->FechaPublicacion;
        $noticia->CategoriaID = $request->CategoriaID;
        $noticia->UsuarioID = $usuario->UsuarioID; // Asignar el UsuarioID del usuario encontrado

        // Guardar la noticia
        $noticia->save();

        return response()->json([
            'message' => 'Noticia creada con éxito',
            'noticia' => $noticia,
        ], 201);


    }
    public function MostrarNoticia(Request $request){

        $noticia = DB::select('SELECT noticias.Titulo, noticias.Contenido, noticias.FechaPublicacion,
                              usuarios.Nombre AS NombreUsuario, usuarios.Email,categorias.Nombre AS NombreCategoria
                       FROM noticias
                       INNER JOIN usuarios ON noticias.UsuarioID = usuarios.UsuarioID
                       INNER JOIN categorias ON noticias.CategoriaID = categorias.CategoriaID');


        return response()->json($noticia);

    }
    public function NoticiaEspecifica()
    {

    }




}
