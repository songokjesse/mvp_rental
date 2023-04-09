<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use App\Models\House;
use App\Models\Location;
use Livewire\Component;

class FilterProperties extends Component
{
    public $price;
    public $location_id;
    public $property_type_id;

    public function render()
    {
        $propertyTypes = Categories::all();
        $locations = Location::all();

        $properties = House::when($this->location_id, function ($query, $location_id) {
            return $query->where('location_id', 'like', '%' . $location_id . '%');
        })
            ->when($this->price, function ($query, $price) {
                return $query->where('price', '<=', $price);
            })
            ->when($this->property_type_id, function ($query, $property_type_id) {
                return $query->where('category_id', $property_type_id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);


        return view('livewire.filter-properties', [
            'propertyTypes' => $propertyTypes,
            'locations' => $locations,
            'properties' => $properties,
        ]);
    }
}
