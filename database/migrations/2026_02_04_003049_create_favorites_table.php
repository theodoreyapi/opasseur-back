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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id('id_favorite')->primary();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id_opasseur')->on('opasseurs')->onDelete('cascade');

            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id_room')->on('rooms')->onDelete('cascade');

            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id_hotel')->on('hotels')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropForeign(['room_id', 'hotel_id', 'user_id']);
            $table->dropColumn('room_id');
            $table->dropColumn('user_id');
            $table->dropColumn('hotel_id');
        });
    }
};
