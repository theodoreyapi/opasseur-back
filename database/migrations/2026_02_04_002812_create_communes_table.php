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
        Schema::create('communes', function (Blueprint $table) {
            $table->id('id_commune')->primary();

            $table->string('nom_commune');

            $table->unsignedBigInteger('pays_id');
            $table->foreign('pays_id')->references('id_pays')->on('pays')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communes');
         Schema::table('communes', function (Blueprint $table) {
            $table->dropForeign(['id_pays']);
            $table->dropColumn('id_pays');
        });
    }
};
