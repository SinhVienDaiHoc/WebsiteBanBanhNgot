<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
   use HasFactory;


    protected $table = 'products'; 


    protected $primaryKey = 'id_Product';

    // Khóa Ngoại (Foreign Keys)

    public function category(): BelongsTo
    {
        // Category Model, Khóa ngoại trong bảng Product (cột hiện tại), Khóa chính trong bảng Category
        return $this->belongsTo(Category::class, 'CATEGORY_id_Category', 'id_Category');
    }

    /**
     * Lấy Admin tạo Product này.
     * Liên kết với ADMIN_id_Admin
     */
    public function admin(): BelongsTo
    {
        // Admin Model, Khóa ngoại trong bảng Product (cột hiện tại), Khóa chính trong bảng Admin
        return $this->belongsTo(Admin::class, 'ADMIN_id_Admin', 'id_Admin');
    }



    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'image_cover',
        'reward_point',
        'ADMIN_id_Admin',
        'CATEGORY_id_Category',
    ];
    
  public function reviews():HasMany{
    return $this->hasMany(Review::class,'PRODUCT_id_Product','id_Product');
  }
}
