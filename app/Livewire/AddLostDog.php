<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\AnimalListStatus;
use Illuminate\Support\Str;

class AddLostDog extends Component
{
    use WithFileUploads;

    public $dog_name;
    public $breed;
    public $color;
    public $description;
    public $date_found;
    public $location_found;
    public $report_type;
    public $images = [];
    public $contact_name;
    public $contact_number;

    public $dog_images = [];   
    public function mount(){
        $this->clearDogImages();
    } 
    public function submitForm()
    {
        $dogImages = session()->get('dog_images', []);
        $uniqueId = Str::uuid();

        $dog = AnimalList::create([
            'dog_name' => $this->dog_name,
            'breed' => $this->breed,
            'color' => $this->color,
            'description' => $this->description,
            'date_found' => $this->date_found,
            'dog_id_unique' => $uniqueId,
            'location_found' => $this->location_found,
            'report_type' => $this->report_type,
            'animal_images' => json_encode($dogImages),
            'contact_name' => $this->contact_name,
            'contact_number' => $this->contact_number,
            'isActive' => 1,
        ]);

        AnimalListStatus::create([
            'animal_id' => $dog->dog_id_unique,
            'status' => 1,
            'isActive' => 1,
        ]);
        
        $this->dispatch('dogSaved', 'Data has been successfully saved!');
        $this->clearDogImages();
        $this->resetForm();
    }
    public function clearDogImages()
    {
        // Remove 'dog_images' from session
        session()->forget('dog_images');
        
        return response()->json([
            'message' => 'Dog images session cleared!'
        ]);
    }
    
    public function uploadImages(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('animal_images', 'public');
    
            // Retrieve and update the session data
            $dogImages = session()->get('dog_images', []);
            $dogImages[] = $filePath;
            session()->put('dog_images', $dogImages);
    
            return response()->json([
                'filePath' => $filePath,
                'message' => 'File uploaded successfully!'
            ]);
        }
        return response()->json([
            'message' => 'No file uploaded.'
        ], 400);
    }

    public function resetForm()
    {
        $this->dog_name = '';
        $this->breed = '';
        $this->color = '';
        $this->description = '';
        $this->date_found = '';
        $this->location_found = '';
        $this->report_type = '';
        $this->images = [];
        $this->contact_name = '';
        $this->contact_number = '';
    }

    public function render()
    {
        return view('livewire.add-lost-dog');
    }
}
