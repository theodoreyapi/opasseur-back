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
        Schema::create('opasseurs', function (Blueprint $table) {
            $table->id('id_opasseur')->primary();
            $table->string('username_opasseur')->nullable();
            $table->string('email_opasseur')->unique()->nullable();
            $table->string('telephone_opasseur')->unique()->nullable();
            $table->string('password_opasseur')->nullable();
            $table->integer('otp_opasseur')->nullable();
            $table->timestamp('otp_expire_at')->nullable();
            $table->boolean('otp_verified')->default(false);
            $table->integer('code_secure_opasseur')->nullable();
            $table->string('role_opasseur')->comment('opasseur, client')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opasseurs');
    }
};
