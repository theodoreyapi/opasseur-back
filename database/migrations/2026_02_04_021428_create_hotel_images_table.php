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
        Schema::create('hotel_images', function (Blueprint $table) {
            $table->id('id_image')->primary();

            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id_room')->on('rooms')->onDelete('cascade');

            $table->string('image_path');
            $table->enum('type', ['photo', '360']);
            $table->boolean('is_main')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_images');
        Schema::table('hotel_images', function (Blueprint $table) {
            $table->dropForeign(['room_id']);
            $table->dropColumn('room_id');
        });
    }
};
