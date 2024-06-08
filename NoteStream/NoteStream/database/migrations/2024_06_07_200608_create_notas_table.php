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
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('IDNota');
            $table->string('Titulo');
            $table->text('Contenido');
            $table->timestamps();
            $table->foreignId('IDUsuario')->constrained('usuarios')->onDelete('cascade'); // Aquí se añade la columna de la llave foránea
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
