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
        Schema::create('predmet_razreds', function (Blueprint $table) {
            $table->unsignedBigInteger('predmetId');
            $table->unsignedBigInteger('razredId');
            $table->integer('fondCasova');
            $table->timestamps();
        
            // Definisanje složenog primarnog ključa
            $table->primary(['predmetId', 'razredId']);
        
            // Definisanje spoljnih ključeva
            $table->foreign('predmetId')->references('id')->on('predmets');
            $table->foreign('razredId')->references('id')->on('razreds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predmet_razreds');
    }
};
