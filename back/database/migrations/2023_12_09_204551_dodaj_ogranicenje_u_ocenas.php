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
        Schema::table('ocenas', function (Blueprint $table) {
            //
           
                $table->integer('vrednost')->unsigned()->nullable(false)->change();
            
        });
        DB::statement('ALTER TABLE ocenas ADD CONSTRAINT check_vrednost_range CHECK (vrednost >= 1 AND vrednost <= 5)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE ocenas DROP CONSTRAINT check_vrednost_range');

        Schema::table('ocenas', function (Blueprint $table) {
            //
            $table->integer('vrednost')->change();
        });
    }
};
