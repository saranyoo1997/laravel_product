<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempImage extends Model
{
   protected $fillable = [
    'name',
    'path',
    'origin',
   ];
}
