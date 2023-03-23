<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    public mixed $price, $name, $location_id, $landlord_id, $category_id;

    protected $fillable = ['name','price', 'location_id', 'category_id', 'landlord_id'];
}
