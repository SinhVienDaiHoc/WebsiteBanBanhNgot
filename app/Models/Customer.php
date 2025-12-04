<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    //HasFactory để tạo và lưu bản ghi
    use HasFactory;
    protected $table = 'customer';
    protected $primaryKey = 'id_Customer';
    public $incrementing = true;
    protected $fillable = [
        'id_Customer',
        'name',
        'email',
        'address',
        'ngaysinh',
        'total_point'
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class,'id_User');
    }
    public function Order():HasMany{
        return $this->hasMany(Order::class,'customer_id_Customer','id_Customer');
    }

}
