<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'voucher_id',
        'total_amount',    
        'status',
        'shipping_address',
        'date',
    ];

   //==========================================
    //RELATIONSHIP
    //Check lấy thông tin người dùng
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    
    // Check order này sử dụng voucher nào để giảm giá
    public function voucher():BelongsTo{
        return $this->belongsTo(Voucher::class);
    }

    //Check chi tiết các sản phẩm có trong giỏ hàng
    public function items():HasMany{
        return $this->hasMany(OrderItem::class,'ORDER_id_Order','id_Order');
    }   

    
    //Điểm thưởng tích lũy được từ đơn hàng này
    public function pointTransactions():HasMany{
        return $this->hasMany(Point::class);
    }
    
    //==========================================
   public function getStatusTextAttribute()
{
    return match ($this->status) {
        'pending', 0 => 'Đang chờ xác nhận',
        'processing', 1 => 'Đang chuẩn bị đơn hàng',
        'shipping', 2 => 'Đang giao hàng',
        'completed', 3 => 'Giao hàng thành công',
        default => 'Không xác định',
    };
}


}
