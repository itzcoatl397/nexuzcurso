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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('email');
            $table->string('password');
            $table->string('texto1');
            $table->string('texto2');
            $table->string('texto3');
            $table->string('texto4');
            $table->string('texto5');
            $table->string('telefono');
            $table->string('pais');
            $table->string('idioma');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
