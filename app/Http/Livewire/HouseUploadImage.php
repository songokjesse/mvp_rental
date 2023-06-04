<?php

namespace App\Http\Livewire;

use App\Models\House;
use App\Models\Image;
use Doctrine\DBAL\Exception\DatabaseDoesNotExist;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
class HouseUploadImage extends Component
{
    use WithFileUploads;
    public $photo;
    public $house_id;


    public function save()
    {
        $validatedData = $this->validate([
            'photo' => 'image|max:1024|mimes:jpeg,png,jpg', // 1MB Max
        ]);
         $validatedData['photo']->storeAs('public/uploads', $this->photo->getClientOriginalName());
         $filename = 'uploads/'.$this->photo->getClientOriginalName();

         $upload_images = new Image();
         $upload_images->name = $filename;
         $upload_images->house_id = $this->house_id;
         $upload_images->is_primary = false;
         $upload_images->save();

         $houses = DB::table('images')
             ->where('house_id', '=', $this->house_id)
             ->count();

        if ($houses == 1) {
            DB::table('images')
                ->where('house_id', '=', $this->house_id)
                ->update(['is_primary'=> true]);
        }

        session()->flash('success', 'Image uploaded successfully.');
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.house-upload-image');
    }




}
