<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{


    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'CategoriaID';
    public $timestamps = false;
    //protected $incrementing = true;
    //campos que van a ser alterados/utilizados
    protected $fillable = [

        'Nombre',

    ];

    public function noticias()
    {
        return $this->hasMany(Noticia::class, 'CategoriaID');
    }
}
