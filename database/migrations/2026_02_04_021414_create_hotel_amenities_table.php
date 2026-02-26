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
        Schema::create('hotel_amenities', function (Blueprint $table) {
            $table->id('id_amenity')->primary();

            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id_hotel')->on('hotels')->onDelete('cascade');

            $table->string('name'); // Jacuzzi, Wifi HD, Piscine
            $table->string('icon')->nullable()->default(""); // nom icône frontend
            $table->boolean('available')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_amenities');
        Schema::table('hotel_amenities', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->dropColumn('hotel_id');
        });
    }
};
