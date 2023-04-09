<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
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
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        $filename = $validatedData['photo']->store('uploads', 'public');

         $images = new Image();
         $images->name = $filename;
         $images->house_id = $this->house_id;
         $images->save();

        session()->flash('success', 'Image uploaded successfully.');
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.house-upload-image');
    }


}
