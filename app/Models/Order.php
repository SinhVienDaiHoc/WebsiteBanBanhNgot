<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Order';
    protected $table = 'order';
    protected $fillable = [
        'id_Order',
        'date',
        'status',
        'total',
        'CUSTOMER_id_Customer',
        'CUSTOMER_CART_id_Cart',
        'VOUCHER_id_Voucher'
    ];
    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class,'CUSTOMER_id_Customer','id_Customer');
    }
    public function order_item():HasMany{
        return $this->hasMany(OrderItem::class,'ORDER_id_Order','id_Order');
    }   
}
