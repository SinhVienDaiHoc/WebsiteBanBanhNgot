<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total',
        'status',
        'customer_name',
        'customer_phone',
        'customer_address',
        'payment_method',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function getStatusTextAttribute()
    {
        return match ($this->status) {
            0, 'pending'    => 'Đang chờ xác nhận',
            1, 'processing' => 'Đang chuẩn bị đơn hàng',
            2, 'shipping'   => 'Đang giao hàng',
            3, 'completed'  => 'Hoàn tất',
            4, 'cancelled', 'canceled' => 'Hủy đơn',
            default         => 'Không xác định',
        };
    }
}

