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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_curso',300);
            $table->string('descripcion_curso',2000);
            $table->string('nombre_archivo');
            $table->string('image_path');
       
            $table->unsignedBigInteger('categoria_id');

            // Definir la relación como una clave externa
            $table->foreign('categoria_id')->references('id')->on('categoria_cursos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
