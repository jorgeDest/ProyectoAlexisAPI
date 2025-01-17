<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Noticia extends Model
{
    //
    protected $table = 'noticias';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'Titulo',
        'FechaPublicacion',
        'Contenido',
        'CategoriaID',
        'UsuarioID'

    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'CategoriaID');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'UsuarioID');
    }


}
