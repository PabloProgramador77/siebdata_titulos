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
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('serial');
            $table->string('noCertificado');
            $table->bigInteger('idResponsable')->unsigned();
            $table->timestamps();

            $table->foreign('idResponsable')->references('id')->on('responsables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificados');
    }
};
