<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id('NoticiaID');
            $table->string('Titulo');
            $table->Text('Contenido');
            $table->date('FechaPublicacion');



            $table->foreignID('UsuarioID')->references('UsuarioID')->on('usuarios');
            
            $table->foreignID('CategoriaID')->references('CategoriaID')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
