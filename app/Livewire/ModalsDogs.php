<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;

class ModalsDogs extends Component
{
    use WithFileUploads;

    public $dogName;
    public $breed;
    public $color;
    public $description;
    public $dog_unique;
    public $dogImages = [];
    public $gender;
    protected $listeners = ['editDoggo'];

    public function editDoggo($id)
    {

        $finddog = AnimalList::where('dog_id_unique', $id)->first();

        $this->dog_unique = $id;
        $this->dogName = $finddog->dog_name;
        $this->breed = $finddog->breed;
        $this->color = $finddog->color;
        $this->gender = $finddog->gender;
        $this->description = $finddog->description;
    }
    public function saveDogData()
    {
        $images = [];
        if ($this->dogImages) {
            foreach ($this->dogImages as $image) {
                $images[] = $image->store('dog-images', 'public'); // Save images in storage
            }
        }
        if ($this->dogName == '' || $this->breed == '' || $this->color == '' || $this->description == "" || count($images) == 0) {
        } else {
            if ($this->dog_unique) {
           
                AnimalList::where('dog_id_unique', $this->dog_unique)->update(['isActive' => 0]);
                $dog = AnimalList::create([
                    'dog_name' => $this->dogName,
                    'dog_id_unique' => $this->dog_unique,
                    'breed' => $this->breed,
                    'color' => $this->color,
                    'gender' => $this->gender,
                    'location_found' => null, // You can adjust this as per your form
                    'date_found' => null,     // Same here
                    'description' => $this->description,
                    'animal_images' => json_encode($images), // Store images as JSON
                    'isActive' => 1,
                ]);
                $this->dispatch('editDogSave', 'Data has been successfully updated!');
            } else {
                $uniqueId = Str::uuid();
                $dog = AnimalList::create([
                    'dog_name' => $this->dogName,
                    'dog_id_unique' => $uniqueId,
                    'breed' => $this->breed,
                    'color' => $this->color,
                    'gender' => $this->gender,
                    'location_found' => null, // You can adjust this as per your form
                    'date_found' => null,     // Same here
                    'description' => $this->description,
                    'animal_images' => json_encode($images), // Store images as JSON
                    'isActive' => 1,
                ]);

                AnimalListStatus::create([
                    'animal_id' => $dog->dog_id_unique,
                    'status' => 1,
                    'isActive' => 1,
                ]);
                $this->dispatch('dogSaved', 'Data has been successfully saved!');
            }
        }
    }


    public function render()
    {
        return view('livewire.modals-dogs');
    }
}
