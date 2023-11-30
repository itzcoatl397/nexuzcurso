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
        Schema::create('imagen_temas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_archivo_imagen');
            $table->string('path_imagen');
            $table->unsignedBigInteger('tema_id');
            $table->foreign('tema_id')->references('id')->on('temas_cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagen_temas');
    }
};
