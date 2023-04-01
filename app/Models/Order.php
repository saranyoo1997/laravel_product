<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true; 
    protected $fillable = [
        'user_id',
        'address',
        'total',
        'province_id',
        'amphur_id',
        'tumbol_id',
        'zidcode',
      
    ];
}
