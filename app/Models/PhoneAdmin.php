<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhoneAdmin extends Model
{
    use HasFactory;
    protected $primaryKey = 'name_admin';
    protected $table='phone_admin';
    protected $fillable = [
        'name_admin',
        'phone_number_admin'
    ];
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'ADMIN_id_Admin', 'id_Admin');
    }
}
