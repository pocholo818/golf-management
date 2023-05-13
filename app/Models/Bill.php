<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table='bill';
    protected $primaryKey = 'bill_id';
    protected $fillable = [
        'bill_code',
        'user_id', 
        'member_name',
        'account_id',
        'appointment_id',
        'type',
        'total',
        'status',
        'remarks',
    ];
}
