<div>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
    <form>
        <div class="row g-3">
            <div class="col-md-4">
                <select wire:model="property_type_id" id="propertyType" class="form-select">
                    <option value="">Select Category...</option>
                    @foreach ($propertyTypes as $propertyType)
                        <option value="{{ $propertyType->id }}">{{ $propertyType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select wire:model="location_id" id="location" class="form-select">
                    <option value="">Select location...</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input wire:model.debounce.500ms="price" type="number" class="form-control" id="price" placeholder="Price">
            </div>
        </div>
    </form>
    </div>



    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($properties as $property)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $property->image_url }}" class="card-img-top" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->location }}</h5>
                        <p class="card-text">{{ $property->property_type }}</p>
                        <p class="card-text">{{ $property->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-3">
        {{ $properties->links() }}
    </div>
</div>
