<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voucher extends Model
{
    use HasFactory;
    protected $table='vouchers';
    protected $fillable = [
        'code',
        'type',
        'discount_amount',
        'min_order_amount',
        'required_points',
        'start_at',
        'expires_at',
        'is_active',      
    ];
    
    //Ép kiểu:
    protected function casts(){
        return[
            'start_at'=>'datetime',
            'expires_at'=>'datetime',
            'is_active'=>'boolean',
        ];
    }

    
    //====================================
    //RELATIONSHIP
   
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
     //====================================


}
