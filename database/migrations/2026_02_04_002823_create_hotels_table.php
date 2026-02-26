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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('id_hotel')->primary();

            // Identité
            $table->string('image');
            $table->string('name'); // Résidence O’Passage
            $table->enum('type', ['hotel', 'residence', 'appartement']);
            $table->text('short_description')->nullable()->default("");
            $table->longText('description_establishment')->nullable()->default("");
            $table->longText('description_accommodation')->nullable()->default("");

            // Localisation
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id_pays')->on('pays');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id_commune')->on('communes');
            $table->string('address')->nullable();
            $table->decimal('latitude', 10, 7)->nullable()->default(0);
            $table->decimal('longitude', 10, 7)->nullable()->default(0);

            // Tarification de base
            $table->decimal('price_per_night', 10, 2); // 25 000 FCFA
            $table->string('currency')->default('FCFA');

            // Règles
            $table->time('check_in_time')->default('14:00');
            $table->time('check_out_time')->default('12:00');
            $table->integer('free_cancellation_hours')->default(48);

            // Statistiques visibles
            $table->integer('reservations_count')->default(0);
            $table->decimal('rating', 2, 1)->default(0); // 5.0
            $table->integer('reviews_count')->default(0);

            // Gestion
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id_opasseur')->on('opasseurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropForeign(['manager_id', 'id_commune', 'id_pays']);
            $table->dropColumn('manager_id');
            $table->dropColumn('id_commune');
            $table->dropColumn('id_pays');
        });
    }
};
