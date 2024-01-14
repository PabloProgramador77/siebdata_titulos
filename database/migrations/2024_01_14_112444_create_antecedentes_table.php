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
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('fechaInicio');
            $table->string('fechaTermino');
            $table->bigInteger('idAlumno')->unsigned();
            $table->bigInteger('idEstudio')->unsigned();
            $table->bigInteger('idEntidad')->unsigned();
            $table->string('cedula')->nullable();
            $table->timestamps();

            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('idEstudio')->references('id')->on('estudios')->onDelete('cascade');
            $table->foreign('idEntidad')->references('id')->on('entidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedentes');
    }
};
