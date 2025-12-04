<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // Khóa chính phải khớp với tên bạn định nghĩa trong Migration
    protected $primaryKey = 'id_Category';

    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    /**
     
     */
    public function products(): HasMany
    {
        // Product Model, Khóa ngoại trong bảng Product (CATEGORY_id_Category), Khóa chính trong bảng Category (id_Category)
        return $this->hasMany(Product::class, 'CATEGORY_id_Category', 'id_Category');
    }
}
