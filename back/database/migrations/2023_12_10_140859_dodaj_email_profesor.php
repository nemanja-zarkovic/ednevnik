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
        Schema::table('profesors', function (Blueprint $table) {
            //
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->string('email')->unique();
            $table->unique('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profesors', function (Blueprint $table) {
            //
            $table->dropColumn('email');
            $table->dropUnique('username');
        });
    }
};
