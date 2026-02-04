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
        Schema::create('hotel_pricings', function (Blueprint $table) {
            $table->id('id_pricing')->primary();

            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id_room')->on('rooms')->onDelete('cascade');

            $table->string('label'); // 1 nuit, 3 nuits, 1 semaine
            $table->integer('nights');
            $table->decimal('price', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_pricings');
        Schema::table('hotel_pricings', function (Blueprint $table) {
            $table->dropForeign(['room_id']);
            $table->dropColumn('room_id');
        });
    }
};
