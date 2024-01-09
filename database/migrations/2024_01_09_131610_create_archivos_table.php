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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->bigInteger('idExpedicion')->unsigned();
            $table->timestamps();

            $table->foreign('idExpedicion')->references('id')->on('expediciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
