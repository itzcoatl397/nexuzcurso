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
        Schema::create('temas_cursos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_tema',255);
            $table->string('descripcion',3000);
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temas_cursos');
    }
};
