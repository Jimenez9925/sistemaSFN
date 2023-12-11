<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Este código crea una migración para una tabla de trabajadores. Establece los campos necesarios para la tabla, como nombres, apellidos, documento, nacimiento, imagen_path, file_path, ingreso, salida y estado. También establece una clave foránea a la tabla de categorías. El método up() se ejecuta cuando se ejecuta la migración y el método down() se ejecuta cuando se deshace la migración.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('documento', 12)->unique();
            $table->date('nacimiento')->nullable();
            $table->string('image_path')->nullable();
            $table->string('file_path')->nullable();
            $table->date('ingreso')->nullable();
            $table->date('salida')->nullable();
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('categoria_id');

            $table->foreign('categoria_id')->references('id')->on('categorias');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
