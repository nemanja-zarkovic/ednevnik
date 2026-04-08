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
        Schema::create('ocenas', function (Blueprint $table) {
            $table->unsignedBigInteger('ucenikId');
            $table->unsignedBigInteger('predmetId');
            $table->unsignedBigInteger('razredId');
            $table->date('datum');
            $table->string('opis');
            $table->string('polugodiste');
            $table->integer('vrednost');
            $table->unsignedBigInteger('profesorId');
            $table->timestamps();
        
            $table->primary(['ucenikId', 'predmetId', 'razredId','datum']);
            $table->foreign('ucenikId')->references('id')->on('uceniks');
            $table->foreign(['predmetId','razredId'])->references(['predmetId','razredId'])->on('predmet_razreds');
            $table->foreign('profesorId')->references('id')->on('profesors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocenas');
    }
};
