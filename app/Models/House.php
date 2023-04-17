<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use HasFactory;


    protected $fillable = ['name','price', 'location_id', 'category_id', 'landlord_id', 'is_featured'];

    public function utilities(): BelongsToMany
    {
        return $this->belongsToMany(Utility::class, 'houses_utilities');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function landlord(): BelongsTo
    {
        return $this->belongsTo(Landlord::class);
    }
     public function location(): BelongsTo
     {
        return $this->belongsTo(Location::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
