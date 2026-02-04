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
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id('id_user_subscription')->primary();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id_opasseur')->on('opasseurs')->onDelete('cascade');
            
            $table->unsignedBigInteger('subscription_plan_id');
            $table->foreign('subscription_plan_id')->references('id_subscription_plan')->on('subscription_plans')->onDelete('cascade');

            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'expired', 'canceled'])->default('active');
            $table->boolean('auto_renew')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'subscription_plan_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('subscription_plan_id');
        });
    }
};
