<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointment';
    protected $primaryKey = 'app_id';
    protected $fillable = [
        'name',
        'capacity',
        'user_id', 
        'date', 
        'time',
        'guests',
    ];
}
