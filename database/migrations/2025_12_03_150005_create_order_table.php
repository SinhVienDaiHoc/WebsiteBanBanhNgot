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
        Schema::create('order', function (Blueprint $table) {
            $table->integer('id_Order');
            $table->dateTime('date')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->decimal('total', 10, 0)->nullable();
            $table->integer('CUSTOMER_id_Customer');
            $table->integer('CUSTOMER_CART_id_Cart');

            $table->primary(['id_Order', 'CUSTOMER_id_Customer', 'CUSTOMER_CART_id_Cart']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
