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
        Schema::table('uceniks', function (Blueprint $table) {
            $table->foreign('odeljenjeId')->references('id')->on('odeljenjes');
            $table->unsignedBigInteger('odeljenjeId')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('uceniks', function (Blueprint $table) {
            $table->dropForeign(['odeljenjeId']);
            $table->integer('odeljenjeId')->change();
        });
    }
};
