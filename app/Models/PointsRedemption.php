<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PointsRedemption extends Model
{
    use HasFactory;
    protected $table='points_redemption';
    protected $fillable = [
        'user_id',
        'points_used',
        'status'
    ];
     //===========================================
    //RELATIONSHIP
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

   public function voucher():BelongsTo{
    return $this->belongsTo(Voucher::class);
}
    //===========================================
}
