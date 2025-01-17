<?php
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register',[UsuarioController::class,'store']);

Route::post('CreateCategoria',[CategoriaController::class,'createCategoria']);

Route::get('getUserName', [UsuarioController::class,'getNameUsers']);

Route::get('Usuario',[UsuarioController::class,'usuario']);


Route::post('login',[UsuarioController::class,'login']);


Route::get('Categorias',[CategoriaController::class,'categoria']);


Route::post('SubirNoticia',[NoticiaController::class,'Noticia']);


Route::get('CargarNoticias',[NoticiaController::class,'MostrarNoticia']);






Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});
