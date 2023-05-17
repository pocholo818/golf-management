<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{
    use HasFactory;
    protected $table = 'kiosk';
    protected $fillable = [
        'name', 
        'account_id', 
        'total', 
        'remarks',
    ];
}
