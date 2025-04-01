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
        Schema::create('artistas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ideventos')->unsigned();
          
            $table->string('nidentidad');
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono');
            $table->string('foto');
            $table->string('descripcion');
            $table->date('fecharegistro');
            $table->string('estado');
            $table->timestamps();
            $table->foreign('ideventos')->references('id')->on('eventos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artistas');
    }
};
