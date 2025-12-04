<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Admin';
    protected $table='admin';
    protected $fillable = [
        'name',
        'email',
        'status',
    ];
    public function phone_number_admin():HasMany{
        return $this->hasMany(PhoneAdmin::class,'ADMIN_id_Admin','id_Admin');

    }
}
