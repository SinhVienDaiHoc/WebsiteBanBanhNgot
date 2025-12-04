<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PointsRedemption extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_PointsRedemption';
    protected $table='points_redemption';
    protected $fillable = [
        'id_PointsRedemption',
        'points_used',
        'redemed_at',
        'status'
    ];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'CUSTOMER_id_Customer', 'id_Customer');
    }
}
