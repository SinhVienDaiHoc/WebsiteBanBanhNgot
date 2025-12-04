<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Point extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Points';
    protected $table='point';
    protected $fillable = [
        'id_Points',
        'points',
        'type',

    ];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'CUSTOMER_id_Customer', 'id_Customer');
    }

}
