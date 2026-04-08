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
        Schema::create('detes', function (Blueprint $table) {
            $table->unsignedBigInteger('roditeljId');
            $table->unsignedBigInteger('ucenikId');
            $table->timestamps();

            $table->primary(['roditeljId', 'ucenikId']);
            $table->foreign('roditeljId')->references('id')->on('roditeljs');
            $table->foreign('ucenikId')->references('id')->on('uceniks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detes');
    }
};
