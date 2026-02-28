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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('id_reservation')->primary();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id_opasseur')->on('opasseurs')->onDelete('cascade');

            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id_room')->on('rooms')->onDelete('cascade');

            $table->unsignedBigInteger('promo_code_id')->nullable();
            $table->foreign('promo_code_id')->references('id_promo_code')->on('promos_codes');

            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', [
                'pending',
                'confirmed',
                'canceled',
                'completed',
                'no_show'
            ])->default('pending');

            $table->string('name_benef')->nullable();
            $table->string('number_benef')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['room_id', 'promo_code_id', 'user_id']);
            $table->dropColumn('room_id');
            $table->dropColumn('user_id');
            $table->dropColumn('promo_code_id');
        });
    }
};
