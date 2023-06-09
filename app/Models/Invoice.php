<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    protected $table='Invoice';
    protected $primaryKey = 'invoice_id';
    protected $fillable = [
        'invoice_number',
        'customer_id',
        'member_name',
        'type',
        'amount',
        'total', 25, 2,
        'status',
       
    ];
}
