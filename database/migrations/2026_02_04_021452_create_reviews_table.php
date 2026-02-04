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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_review')->primary();

            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id_hotel')->on('hotels')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id_opasseur')->on('opasseurs')->onDelete('cascade');

            $table->tinyInteger('rating'); // 1 à 5
            $table->text('comment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['hotel_id', 'user_id']);
            $table->dropColumn('hotel_id');
            $table->dropColumn('user_id');
        });
    }
};
