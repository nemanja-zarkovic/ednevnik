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
        Schema::create('predavacs', function (Blueprint $table) {
            $table->unsignedBigInteger('profesorId');
            $table->unsignedBigInteger('odeljenjeId');
            $table->timestamps();
        
            $table->primary(['profesorId', 'odeljenjeId']);
            $table->foreign('profesorId')->references('id')->on('profesors');
            $table->foreign('odeljenjeId')->references('id')->on('odeljenjes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predavacs');
    }
};
