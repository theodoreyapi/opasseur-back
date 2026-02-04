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
        Schema::create('reservation_histories', function (Blueprint $table) {
            $table->id('id_reservation_history')->primary();

            $table->unsignedBigInteger('changed_by');
            $table->foreign('changed_by')->references('id_opasseur')->on('opasseurs')->onDelete('cascade');

            $table->unsignedBigInteger('reservation_id');
            $table->foreign('reservation_id')->references('id_reservation')->on('reservations')->onDelete('cascade');
            
            $table->string('old_status');
            $table->string('new_status');
            $table->string('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_histories');
        Schema::table('reservation_histories', function (Blueprint $table) {
            $table->dropForeign(['reservation_id', 'changed_by']);
            $table->dropColumn('reservation_id');
            $table->dropColumn('changed_by');
        });
    }
};
