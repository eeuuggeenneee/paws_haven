<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\AnimalListStatus;
use App\Models\DogBreed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AddLostDog extends Component
{
    use WithFileUploads;

    public $dog_name;
    public $breed;
    public $color;
    public $gender;
    public $description;
    public $date_found;
    public $location_found;
    public $report_type = 3;
    public $images = [];
    public $contact_name;
    public $contact_number;
    public $breedlist;
    public $dog_images = [];
    public $dog_unique;
    public $barangay_f;
    public $updatedog = false;
    protected $listeners = ['editDoggo', 'adddog'];
    public function mount()
    {
        $this->clearDogImages();
        $this->breedlist = DogBreed::where('isActive', 1)->get();
    }
    public function updateForm()
    {
        $finddog = AnimalList::where('dog_id_unique', $this->dog_unique)->where('isActive', 1)->first();
        $dogImages = session()->get('dog_images', []);

        if ($finddog) {
            if ($dogImages) {
                $finddog->animal_images = json_encode($dogImages);
            }
            $finddog->dog_name = $this->dog_name;
            $finddog->dog_id_unique = $this->dog_unique;
            $finddog->breed = $this->breed;
            $finddog->color = $this->color;
            $finddog->gender = $this->gender;
            $finddog->report_type = $this->report_type;
            $finddog->barangay = $this->barangay_f;
            $finddog->location_found = $this->location_found;
            $finddog->date_found = $this->date_found;
            $finddog->description = $this->description;
            $finddog->contact_name = $this->contact_name;
            $finddog->contact_number = $this->contact_number;
            $finddog->isActive = 1;
            $finddog->save();
        }

        $this->clearDogImages();
        $this->dispatch('dogUpdate', 'Data has been successfully updated!');
    }
    public function adddog()
    {
        //clear the variables
        $this->updatedog = false;
        $this->dog_unique = null;
        $this->dog_name = null;
        $this->breed = null;
        $this->color = null;
        $this->gender = null;
        $this->barangay_f = null;
        $this->description = null;
        $this->date_found = null;
        $this->location_found = null;
        $this->contact_name = null;
        $this->contact_number = null;
    }
    public function editDoggo($id)
    {
        $this->updatedog = true;
        $finddog = AnimalList::where('dog_id_unique', $id)->where('isActive', 1)->first();
        $this->dog_unique = $finddog->dog_id_unique;
        $this->dog_name = $finddog->dog_name;
        $this->breed = $finddog->breed;
        $this->color = $finddog->color;
        $this->gender = $finddog->gender;
        $this->barangay_f = $finddog->barangay;
        $this->description = $finddog->description;
        $this->date_found = $finddog->date_found;
        $this->location_found = $finddog->location_found;
        $this->contact_name = $finddog->contact_name;
        $this->contact_number = $finddog->contact_number;
    }
    public function submitForm()
    {
        $dogImages = session()->get('dog_images', []);
        $uniqueId = Str::uuid();

        $dog = AnimalList::create([
            'dog_name' => $this->dog_name,
            'breed' => $this->breed,
            'color' => $this->color,
            'gender' => $this->gender,
            'description' => $this->description,
            'date_found' => $this->date_found,
            'dog_id_unique' => $uniqueId,
            'barangay' => $this->barangay_f,
            'location_found' => $this->location_found,
            'report_type' => $this->report_type,
            'animal_images' => json_encode($dogImages),
            'contact_name' => $this->contact_name,
            'contact_number' => $this->contact_number,
            'isActive' => 1,
            'user_id' => Auth::user()->id,
        ]);

        if (Auth::user()->type == 0) {
            AnimalListStatus::create([
                'animal_id' => $dog->dog_id_unique,
                'status' => 8,
                'isActive' => 1,
            ]);
            $formattedId = str_pad($dog->id, 4, '0', STR_PAD_LEFT);
            $ticket = 'F' . $dog->created_at->format('ym') . '-' . $formattedId;
    
            $this->dispatch('dogSaved', $ticket);
        } else {
            AnimalListStatus::create([
                'animal_id' => $dog->dog_id_unique,
                'status' => $this->report_type,
                'isActive' => 1,
            ]);
            $this->dispatch('dogSaved', 'Data has been successfully saved!');
        }
        
        $this->dispatch('fetchdatanotif');
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
