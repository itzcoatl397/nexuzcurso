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
        Schema::create('reconicimiento_curso', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_archivo_fondo');
            $table->string('image_path_fondo');
            $table->string('nombre_archivo_pie');
            $table->string('image_path_pie');
            $table->string('nombre_archivo_encabezado');
            $table->string('image_path_encabezado');
            $table->string('texto1');
            $table->string('texto2');
            $table->string('texto3');
            $table->string('texto4');
            $table->string('texto5');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reconicimiento_curso');
    }
};
