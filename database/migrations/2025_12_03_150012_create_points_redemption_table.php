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
        Schema::create('points_redemption', function (Blueprint $table) {
            $table->integer('id_PointsRedemption')->primary();
            $table->integer('points_used')->nullable();
            $table->dateTime('redemed_at')->useCurrentOnUpdate()->nullable()->useCurrent();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points_redemption');
    }
};
