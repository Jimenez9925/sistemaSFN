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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('numticketInventario', 200);
            $table->string('descripcion', 500);
            $table->string('foto', 200)->nullable();
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('trabajador_id');
            $table->unsignedBigInteger('catalogo_id');
            $table->unsignedBigInteger('estado_id');

            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('trabajador_id')->references('id')->on('workers');
            $table->foreign('catalogo_id')->references('id')->on('catalogos');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
