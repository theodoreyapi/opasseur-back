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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('id_room')->primary();

            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id_hotel')->on('hotels')->onDelete('cascade');

            $table->string('name'); // Studio premium
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('living_rooms')->default(0);
            $table->integer('capacity')->default(0); // Number of people

            $table->decimal('price_per_night', 10, 2);
            $table->boolean('is_available')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->dropColumn('hotel_id');
        });
    }
};
