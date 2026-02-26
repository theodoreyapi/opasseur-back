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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payment')->primary();

            $table->unsignedBigInteger('reservation_id');
            $table->foreign('reservation_id')->references('id_reservation')->on('reservations')->onDelete('cascade');

            $table->decimal('deposit_amount', 10, 2)->default(0);
            $table->decimal('remaining_amount', 10, 2)->default(0);

            $table->decimal('amount', 10, 2);
            $table->string('method');
            $table->string('payment_method'); // wave, orange_money, djamo
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');

            $table->string('checkout_session_id')->nullable();
            $table->string('transaction_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['reservation_id']);
            $table->dropColumn('reservation_id');
        });
    }
};
