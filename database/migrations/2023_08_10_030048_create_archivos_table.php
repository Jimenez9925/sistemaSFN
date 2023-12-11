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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('area');
            $table->string('archivo');
            $table->string('path')->unique();
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('trabajador_id');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('trabajador_id')->references('id')->on('workers');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
