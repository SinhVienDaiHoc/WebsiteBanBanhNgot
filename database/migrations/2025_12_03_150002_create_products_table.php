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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price');
            $table->integer('stock')->default(0);
            $table->string('description')->nullable();
            $table->string('image_cover');
            $table->integer('reward_point')->default(0);
            $table->timestamps();
            
            //==================================================
            //cần check kĩ
            $table->foreignId('ADMIN_id_Admin')
                  ->references('id_Admin') // Tham chiếu đến 'id_Admin' trong bảng 'admins'
                  ->on('admins')
                  ->constrained() // Cú pháp chuẩn của Laravel
                  ->onDelete('restrict'); // Không cho xóa Admin nếu còn Product

            // Khóa ngoại liên kết với bảng CATEGORY (CATEGORY_id_Category)
            // Giả định tên bảng là 'categories' và khóa chính là 'id_Category'
            $table->foreignId('CATEGORY_id_Category')
                  ->references('id_Category') // Tham chiếu đến 'id_Category' trong bảng 'categories'
                  ->on('categories')
                  ->constrained() // Cú pháp chuẩn của Laravel
                  ->onDelete('cascade'); // Xóa Product nếu Category bị xóa
                  //===============================================
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
