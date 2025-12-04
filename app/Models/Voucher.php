<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voucher extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Voucher';
    protected $table='voucher';
    protected $fillable = [
        'id_Voucher',
        'code',
        'name',
        'description',
        'required_points',
        'discount_amount',
        'type',
        'status'
    ];
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'VOUCHER_id_Voucher', 'id_Voucher');
    }
}
