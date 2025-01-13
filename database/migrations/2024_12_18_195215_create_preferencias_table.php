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
        Schema::create('preferencias', function (Blueprint $table) {
            $table->id('PreferenciaID');
            $table->unsignedBigInteger('UsuarioID');
            $table->unsignedBigInteger('CategoriaID');

            $table->foreign('UsuarioID')->references('UsuarioID')->on('usuarios')->onDelete('cascade');
            $table->foreign('CategoriaID')->references('CategoriaID')->on('categorias')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferencias');
    }
};
