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
        Schema::table('roditeljs', function (Blueprint $table) {
            $table->string('ime');
            $table->string('prezime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roditeljs', function (Blueprint $table) {
            // 
            $table->dropColumn('ime');
            $table->dropColumn('prezime');
        });
    }
};
