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
        Schema::create('points_redemptions', function (Blueprint $table) {
            $table->id();
            $table->integer('points_used');
            $table->unsignedTinyInteger('status')->default(1);//thành công = 1, fail = 0
            $table->timestamps();

            //=========================================
            //CÁC RÀNG BUỘC
            //Bảng users
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade');

            //Bảng voucher
            $table->foreignId('voucher_id')
            ->constrained('vouchers')
            ->onDelete('restrict');
        

           
            //=========================================
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points_redemptions');
    }
};
