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
        Schema::create('terminacion_curso', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_archivo');
            $table->string('image_path');
            $table->string('texto1');
            $table->string('texto2');
            $table->string('texto3');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminacion_curso');
    }
};
