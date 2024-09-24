<?php

namespace App\Livewire;

use App\Models\AdoptionForm;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\Rounds;
use Illuminate\Support\Facades\Auth;

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
    public $activedog;

    public $fulladdress;
    public $specificloc;
    public $reason;
    public $schedule;
    public $contact;

    public $a_fname;
    public $a_lname;
    public $a_contact;
    public $a_address;
    public $a_materials;
    public $a_tos;

    protected $listeners = ['editDoggo', 'activedog'];

    public function confirmadoption()
    {
        AdoptionForm::create([
            'fullname' => $this->a_fname . ' ' . $this->a_lname,
            'c_number' => $this->a_contact,
            'address' => $this->a_address,
            'materials' => $this->a_materials,
            'tos_agree' => $this->a_tos,
            'dog_id_unique' => $this->dog_unique,
            'user_id' => Auth::user()->id,
        ]);
        AnimalListStatus::where('dog_id_unique', $this->dog_unique)->update(['isActive' => 0]);

        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 4,
            'isActive' => 1,
        ]);
    }
    public function saveRounds()
    {
        Rounds::create([
            'address' => $this->fulladdress,
            'specific_location' => $this->specificloc,
            'reason' => $this->reason,
            'schedule' => $this->schedule,
            'contact' => $this->contact,
            'user_id' => Auth::user()->id,
        ]);
        $this->dispatch('saveRounds', 'Your rounds request has been successfully saved! Please expect a call from the pound when your request is approved. Thank you!');
    }
    public function activedog($id)
    {
        $this->dog_unique = $id;
        $this->activedog = AnimalList::where('dog_id_unique', $id)->where('isActive', true)->first();
    }
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
