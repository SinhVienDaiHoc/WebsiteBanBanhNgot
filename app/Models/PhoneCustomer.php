<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhoneCustomer extends Model
{
    use HasFactory;
    protected $primaryKey = 'name_customer';
    protected $table='phone_customer';
    protected $fillable = [
        'name_customer',
        'phone_number_customer'
    ];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'CUSTOMER_id_Customer', 'id_Customer');
    }
}
