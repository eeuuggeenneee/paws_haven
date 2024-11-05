<?php

namespace App\Livewire;

use App\Models\AdoptionForm;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\DogBreed;
use App\Models\DogClaim;
use App\Models\Rounds;
use App\Models\RoundsStatus;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ModalsDogs extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $dogName;
    public $breed;
    public $color;
    public $description;
    public $dog_unique;
    public $dogImages = [];
    public $gender;
    public $activedog;

    public $fulladdress;
    public $barangay;
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
    public $a_reason;


    public $c_fname;
    public $c_lname;
    public $c_contact;
    public $c_breed;
    public $c_gender;
    public $c_proof;
    public $c_loc;
    public $c_desc;
    public $c_address;

    public $breedName;
    public $breedlist;
    public $updatedog = false;

    protected $listeners = ['editDoggo', 'activedog','clearData','saveDogData'];
    public function addDogBreed()
    {
        DogBreed::create([
            'name' => $this->breedName,
            'isActive' => 1,
        ]);
        $this->dispatch('dogSaved', 'Data has been successfully saved!');
    }
    public function confirmclaim()
    {
        if ($this->c_proof) {
            $path = $this->c_proof->store('claim_pictures', 'public');
        }
        $claimgo = DogClaim::create([
            'fullname' => $this->c_fname . ' ' . $this->c_lname,
            'address' => $this->c_address,
            'dog_description' => $this->c_desc,
            'breed' => $this->c_breed,
            'gender' => $this->c_gender,
            'contact' =>  $this->c_contact,
            'proof' => $path,
            'last_loc' => $this->c_loc,
            'dog_id_unique' => $this->dog_unique,
            'isActive' => 1,
            'user_id' => Auth::user()->id,
        ]);

        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);
        $status = AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 6,
            'isActive' => 1,
        ]);

        $formattedId = str_pad($claimgo->id, 4, '0', STR_PAD_LEFT);
        $ticket = 'C' . $claimgo->created_at->format('ym') . '-' . $formattedId;

        $this->dispatch('dogClaimed', 'Your claim request has been successfully saved! Please expect a call from the pound when your request is approved. Thank you!', $ticket);
    }

    public function confirmadoption()
    {
        $adoptionid = AdoptionForm::create([
            'fullname' => $this->a_fname . ' ' . $this->a_lname,
            'c_number' => $this->a_contact,
            'reason' => $this->a_reason,
            'address' => $this->a_address,
            'materials' => $this->a_materials,
            'tos_agree' => $this->a_tos,
            'dog_id_unique' => $this->dog_unique,
            'user_id' => Auth::user()->id,
        ]);
        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);

        $status = AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 4,
            'isActive' => 1,
        ]);

        $formattedId = str_pad($adoptionid->id, 4, '0', STR_PAD_LEFT);
        $ticket = 'A' . $adoptionid->created_at->format('ym') . '-' . $formattedId;

        $this->dispatch('dogAdopted', 'Your adoption request has been successfully saved! Please expect a call from the pound when your request is approved. Thank you!', $ticket);
    }
    public function saveRounds()
    {
        $rounds = Rounds::create([
            'address' => $this->fulladdress,
            'barangay' => $this->barangay,
            'specific_location' => $this->specificloc,
            'reason' => $this->reason,
            'schedule' => ' ',
            'contact' => $this->contact,
            'is_active' => 1,
            'user_id' => Auth::user()->id,
        ]);

        $status = RoundsStatus::create([
            'rounds_id' => $rounds->id,
            'is_active' => 1,
        ]);

        $formattedId = str_pad($rounds->id, 4, '0', STR_PAD_LEFT);
        $ticket = 'R' . $rounds->created_at->format('ym') . '-' . $formattedId;

        $this->dispatch('saveRounds', 'Your rounds request has been successfully saved! Please expect a call from the pound when your request is approved. Thank you!', $ticket);
    }
    public function activedog($id)
    {
        $this->dog_unique = $id;
        $this->activedog = AnimalList::where('dog_id_unique', $id)->where('isActive', true)->first();
    }
    public function editDoggo($id)
    {
        $finddog = AnimalList::where('dog_id_unique', $id)->first();
        $this->updatedog = true;
        $this->dog_unique = $id;
        $this->dogName = $finddog->dog_name;
        $this->breed = $finddog->breed;
        $this->color = $finddog->color;
        $this->gender = $finddog->gender;
        $this->description = $finddog->description;
    }
    public function clearData()
    {
        // dd('hello');
        $this->updatedog = false;
        $this->dog_unique = '';
        $this->dogName = '';
        $this->breed = '';
        $this->color = '';
        $this->gender = '';
        $this->description = '';
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
    public function mount() {
        $this->breedlist = DogBreed::where('isActive',1)->get();
    }
    public function render()
    {
        return view('livewire.modals-dogs');
    }
}
