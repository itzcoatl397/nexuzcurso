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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id'); // Columna para la clave externa de curso
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade'); // Clave foránea
            $table->integer('calificacion');
            $table->enum('recomendar', ['si', 'no']);
            $table->enum('interes_otro_curso', ['si', 'no']);
            $table->string('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
