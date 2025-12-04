<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Metadata\Before;

class Review extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Reviews';
    protected $table='reviews';
    protected $fillable = [
        'created_at',
'rating',
'comment',
'CUSTOMER_id_Customer',
'PRODUCT_id_Product'
    ];

public function product():BelongsTo{
    return $this->belongsTo(Product::class,'PRODUCT_id_Product','id_Product');
}

public function customer():BelongsTo{
    return $this->belongsTo(Customer::class,'CUSTOMER_id_Customer','id_Customer');
}


}
