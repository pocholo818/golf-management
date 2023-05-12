<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;
    protected $table ='Merchandise';
    protected $fillable = [
        'name', 
        'account_id', 
        'total', 
    ];
}
