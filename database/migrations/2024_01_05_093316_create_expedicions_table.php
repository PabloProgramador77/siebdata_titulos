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
        Schema::create('expediciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('servicioSocial')->unsigned();
            $table->bigInteger('idFundamento')->unsigned();
            $table->bigInteger('idAlumno')->unsigned();
            $table->bigInteger('idTitulacion')->unsigned();
            $table->bigInteger('idEntidad')->unsigned();
            $table->string('fechaExamen')->nullable();
            $table->string('fechaExencion')->nullable();
            $table->timestamps();

            $table->foreign('idFundamento')->references('id')->on('fundamentos')->onDelete('cascade');
            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('idTitulacion')->references('id')->on('titulaciones')->onDelete('cascade');
            $table->foreign('idEntidad')->references('id')->on('entidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedicions');
    }
};
