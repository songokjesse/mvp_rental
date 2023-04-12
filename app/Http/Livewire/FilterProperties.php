<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use App\Models\House;
use App\Models\Location;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class FilterProperties extends Component
{
    use WithPagination;
    public $price;
    public $location_id;
    public $property_type_id;

    public function render()
    {
        $propertyTypes = Categories::all();
        $locations = Location::all();
        $properties = $this->filteredProperties();

        $properties = House::when($this->location_id, function ($query, $location_id) {
            return $query->where('location_id',  $location_id);
        })
            ->when($this->price, function ($query, $price) {
                return $query->where('price', '<=', $price);
            })
            ->when($this->property_type_id, function ($query, $property_type_id) {
                return $query->where('category_id', $property_type_id);
            })
            ->join('locations', 'houses.location_id', '=', 'locations.id')
            ->join('categories', 'houses.category_id', '=', 'categories.id')
            ->leftJoin('images', function ($join) {
                $join->on('images.house_id', '=', 'houses.id')
                    ->where('images.is_primary', '=', true);
            })
            ->select('houses.id','houses.name', 'locations.name as location_name', 'categories.name as category_name', 'houses.price', 'houses.verified', 'images.name AS image_name')
            ->orderBy('houses.created_at', 'desc')
            ->paginate(9);


        return view('livewire.filter-properties', [
            'propertyTypes' => $propertyTypes,
            'locations' => $locations,
            'properties' => $properties,
        ]);
    }

    private function filteredProperties(): LengthAwarePaginator
    {
        $query =House::query();

        if ($this->property_type_id) {
            $query->where('category_id', $this->property_type_id);
        }

        if ($this->location_id) {
            $query->where('location_id', $this->location_id);
        }

        if ($this->price) {
            $query->where('price', '<=', $this->price);
        }

        return $query->paginate(9);
    }
}
