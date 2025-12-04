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
        Schema::create('order_item', function (Blueprint $table) {
            
            // Khóa chính: Thay integer bằng BigIncrements hoặc unsignedBigInteger để tương thích tốt hơn
            $table->unsignedBigInteger('id_OrderItem')->primary(); 
            
            // 1. KHAI BÁO CỘT KHÓA NGOẠI (Cần có trước foreign() )
            
            // Liên kết đến Order (Giả định cột khóa ngoại là ORDER_id_Order)
            $table->unsignedBigInteger('ORDER_id_Order'); 
            
            // Liên kết đến Product (Giả định cột khóa ngoại là PRODUCT_id_Product)
            $table->unsignedBigInteger('PRODUCT_id_Product'); 
            
            // Các cột dữ liệu
            $table->dateTime('date')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->decimal('total', 10, 0)->nullable();
            $table->decimal('amount', 10, 0)->nullable();
            $table->timestamps(); // Nên thêm cột timestamps cho các bảng giao dịch

            // 2. ĐỊNH NGHĨA KHÓA NGOẠI (Foreign Key)
            
            // Sửa lỗi: Sử dụng tên cột khóa ngoại chính xác và tham chiếu bảng 'order'
            $table->foreign('ORDER_id_Order') // <--- Tên cột khóa ngoại trong bảng order_item
                  ->references('id_Order')    // <--- Tên cột khóa chính trong bảng order
                  ->on('order')               // <--- TÊN BẢNG CHA CHÍNH XÁC (Không phải 'orders')
                  ->onDelete('cascade');
                  
            // Sửa lỗi: Sử dụng tên cột khóa ngoại chính xác (Giả định là PRODUCT_id_Product)
            $table->foreign('PRODUCT_id_Product') // <--- Tên cột khóa ngoại trong bảng order_item
                  ->references('id_Product')    // <--- Tên cột khóa chính trong bảng products
                  ->on('products')              // <--- Tên bảng cha
                  ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item');
    }
};