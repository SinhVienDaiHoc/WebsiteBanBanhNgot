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
            $table->id();
            $table->tinyInteger('method')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->decimal('amount', 10, 0)->nullable();
            $table->timestamps();
              //===================================
            //CÁC RÀNG BUỘC
            //Bảng orders
            $table->foreignId('order_id')
            ->constrained('orders')
            ->onDelete('cascade');

            $table->unique('order_id');
            //===================================
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
