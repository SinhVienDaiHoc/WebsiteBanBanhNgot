<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Payment';
    protected $table='payment';
    protected $fillable = [
        'method',
        'paid_at',
        'amount'
    ];
    public function order(): HasOne
    {
        // Giả sử mối quan hệ là 1-1 qua khóa ngoại trong bảng Payment
        return $this->hasOne(Order::class, 'ORDER_id_Order', 'id_Order');
    }
}
