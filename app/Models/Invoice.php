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
        'customer_id',
     // 'member_name',
        'total', 25, 2,
        'status',
       
    ];
}
