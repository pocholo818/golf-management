<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table='bill';
    protected $fillalbe = [
        'bill_id',
        'bill_code',
        'user_id', 
        'account_id',
        'appointment_id',
        'total',
        'status',
        'remarks',
    ];
}
