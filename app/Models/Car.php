<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
     protected $fillable = ['brand_name', 'name_plate', 'yearOfPurchase'];
}
