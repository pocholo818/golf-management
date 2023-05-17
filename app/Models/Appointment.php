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
        'account_code',
        'member_name',
        'price',
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Members', 'user_id','customer_id'); 
    }
}
