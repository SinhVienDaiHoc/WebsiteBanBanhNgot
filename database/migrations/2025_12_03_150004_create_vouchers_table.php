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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code',191)->unique();
            $table->string('name',191)->nullable();
            $table->string('description')->nullable();
            $table->integer('required_points')->default(0);//Admin sẽ set sau
            $table->decimal('discount_amount', 10, 0);
            $table->tinyInteger('type')->nullable();//Giảm theo % hoặc trực tiếp
            $table->tinyInteger('status')->default(true);
            $table ->timestamp('expires_at')->nullable();//Time hiệu lực
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
