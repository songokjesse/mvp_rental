<div>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
    <form >
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
                <input wire:model.debounce.500ms="price" type="number" class="form-control" id="price" placeholder="Price in Ksh">
            </div>
        </div>
    </form>
    </div>



    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($properties as $property)
            <a href="{{route( 'house_details', $property->id)}}" class="text-black ">
            <div class="col">
                @if($property->verified == "1")
                    <div class="card h-100 border-success ">
                @else
                        <div class="card h-100 border-warning ">
                @endif
                @if($property->image_name)
                    <img src="{{ asset('storage/'. $property->image_name) }}" class="card-img-top" alt="Property Image" height="150" width="100">
                            @else
                    <img src="{{ 'https://res.cloudinary.com/homework-support-com/image/upload/v1681148696/ctvdsg71vds0vsku3wwy.jpg' }}" class="card-img-top" alt="Property Image" height="150" width="100">
                            @endif
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-7">
                                <h5 class="card-title">
                                    <span class="badge text-bg-light">    <i class="bi bi-globe-europe-africa"></i> {{ $property->location_name }} </span>
                                </h5>
                            </div>
                            <div class="col-4">
                            @if($property->verified == "1")
                                    <span class="badge text-bg-success"> <i class="bi bi-award"></i> Verified  </span>
                                @else
                                    <span class="badge text-bg-warning"> <i class="bi bi-shield-exclamation"></i> Not Verified  </span>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-7">
                                <p class="card-text">
                                    <span class="badge text-bg-light">  <i class="bi bi-house-door"></i> {{ $property->category_name }} </span>
                                </p>
                            </div>
                            <div class="col-5 text-end">
                                <p class="card-text">
                                    <span class="badge text-bg-light"> <i class="bi bi-cash-stack"></i> Ksh: {{ $property->price }} </span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </a>
        @endforeach
    </div>
    <div class="mt-3">
        {{ $properties->links() }}
    </div>
</div>
