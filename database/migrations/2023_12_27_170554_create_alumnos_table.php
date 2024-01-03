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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('primerApellido');
            $table->string('segundoApellido')->nullable();
            $table->string('curp')->unique();
            $table->string('email')->unique();
            $table->bigInteger('idCarrera')->unsigned();
            $table->string('fechaInicio');
            $table->string('fechaTermino');
            $table->timestamps();

            $table->foreign('idCarrera')->references('id')->on('carreras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
