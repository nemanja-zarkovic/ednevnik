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
            //
            $table->string('username')->withoutWhitespace()->regex('/^[^\d].*/');
            $table->string('password')->withoutWhitespace();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('uceniks', function (Blueprint $table) {
            //
            table->dropColumn('username');
            table->dropColumn('password');
        });
    }
};
