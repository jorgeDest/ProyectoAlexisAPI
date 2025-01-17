<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    //
    protected $table = 'usuarios';
    protected $primaryKey = 'UsuarioID';

    public $timestamps = false;
    public $incrementing = true;
    //campos que van a ser alterados/utilizados
    protected $fillable = [
        'Nombre',
        'Email',
        'password',
        'NoticiaID',

    ];


    public function noticias()
    {
        return $this->hasMany(Noticia::class, 'UsuarioID');
    }


}
