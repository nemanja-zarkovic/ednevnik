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
        Schema::create('odeljenjes', function (Blueprint $table) {
            $table->id();
            $table->integer('indeks');
            $table->unsignedBigInteger('razredId');
            $table->foreign('razredId')->references('id')->on('razreds');
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odeljenjes');
    }
};
