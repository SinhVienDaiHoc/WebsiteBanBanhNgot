<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_OrderItem';
    protected $table='order_item';
    protected $fillable = [
'id_OrderItem',
'date',
'status',
'total',
'amount',

    ];
    public function order():BelongsTo{
        return $this->belongsTo(Order::class,'ORDER_id_Order','id_Order');
    }

    public function product():BelongsTo{
        return $this->belongsTo(Product::class,'PRODUCT_id_Product','id_Product');
    }
}
