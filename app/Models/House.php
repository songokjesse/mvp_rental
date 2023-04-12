<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class House extends Model
{
    use HasFactory;


    protected $fillable = ['name','price', 'location_id', 'category_id', 'landlord_id'];

    public function utilities(): BelongsToMany
    {
        return $this->belongsToMany(Utility::class, 'houses_utilities');
    }
}
