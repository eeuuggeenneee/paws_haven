<?php

namespace App\Livewire;

use App\Models\AdoptionForm;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\Annoucement;
use App\Models\DogBreed;
use App\Models\DogClaim;
use App\Models\Rounds;
use App\Models\RoundsStatus;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class ModalsDogs extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $texteditor;
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

    public $a_title;
    public $sub_title;

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
    public $previmages;

    public $edit_a_title;
    public $edit_sub_title;
    public $edit_message;
    public $editA_id;
    public $otpdigis;
    public $otp_input;
    public $request_w;
    public $otp_attempts = 0;
    protected $listeners = ['verifyMobile','cancelPosing', 'editDoggo', 'activedog', 'clearData', 'saveDogData', 'editAnnouncement', 'deleteAnnoucement'];

    public function deleteAnnoucement($a_id)
    {

        Annoucement::where('id', $a_id)->where('isActive', 1)->update(['isActive' => 0]);
    }
    public function editAnnouncement($id)
    {
        $this->editA_id = Annoucement::where('id', $id)->first();
        $this->edit_a_title = $this->editA_id->title;
        $this->edit_sub_title = $this->editA_id->sub_title;
        $this->edit_message = $this->editA_id->message;
    }
    public function saveUpdateAnnounce()
    {
        if ($this->editA_id) {
            $this->editA_id->title = $this->edit_a_title;  // New title
            $this->editA_id->sub_title = $this->edit_sub_title;  // New sub_title
            $this->editA_id->message = $this->edit_message;  // New message
            $this->editA_id->save();
        }
        // $this->dispatch('annoucementSave', 'Annoucement has been successfully updated!');
    }
    public function saveAnnoucement()
    {

        Annoucement::create([
            'message' => $this->texteditor,
            'title' => $this->a_title,
            'sub_title' => $this->sub_title,
            'isActive' => 1,
            'user_id' => Auth::user()->id,
        ]);
        $this->dispatch('annoucementSave', 'Annoucement has been successfully saved!');
    }
    public function addDogBreed()
    {
        $dataDog = DogBreed::create([
            'name' => $this->breedName,
            'isActive' => 1,
        ]);
        $this->dispatch('newdogbreed', $dataDog);

        $this->alert('success', 'New dog breed has been added');
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
            'proof' => $path ?? null,
            'last_loc' => $this->c_loc,
            'dog_id_unique' => $this->dog_unique,
            'isActive' => 1,
            'user_id' => Auth::user()->id,
        ]);
        $checkdata = AnimalListStatus::where('animal_id', $this->dog_unique)->where('isActive', 1)->first();
        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);

        if ($checkdata->status == 2) {
            $status = AnimalListStatus::create([
                'animal_id' => $this->dog_unique,
                'status' => 11,
                'isActive' => 1,
            ]);
        } else {
            $status = AnimalListStatus::create([
                'animal_id' => $this->dog_unique,
                'status' => 6,
                'isActive' => 1,
            ]);
        }


        $formattedId = str_pad($claimgo->id, 4, '0', STR_PAD_LEFT);
        $ticket = 'C' . $claimgo->created_at->format('ym') . '-' . $formattedId;

        $this->dispatch('dogClaimed', 'Your claim request has been successfully saved! Please expect a call from the pound when your request is approved. Thank you!', $ticket);
        $this->dispatch('fetchdatanotif');
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

        $this->a_fname = '';
        $this->a_lname = '';
        $this->a_contact = '';
        $this->a_reason = '';
        $this->a_address = '';
        $this->a_materials = '';
        $this->a_tos = false; // Assuming it's a checkbox
        $this->dog_unique = null;
        
        $this->dispatch('dogAdopted', 'Your adoption request has been successfully saved! Please expect a call from the pound when your request is approved. Thank you!', $ticket);
        $this->dispatch('fetchdatanotif');
        $this->dispatch('fetchdataAdopt');
    }
    public function saveRounds()
    {
        try {
            $rounds = Rounds::create([
                'address' => $this->fulladdress,
                'barangay' => $this->barangay,
                // 'specific_location' => $this->specificloc,
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
            $this->reset(['fulladdress', 'barangay', 'contact', 'reason']);
        } catch (Throwable $r) {
        }

        $this->dispatch('saveRounds', 'Your rounds request has been successfully saved! Please expect a call from the pound when your request is approved. Thank you!', $ticket);
        $this->dispatch('fetchdatanotif');
    }
    public function checkOTP()
    {
        // Get the current user ID
        $userId = Auth::user()->id;

        // Check if the user has exceeded the OTP attempts limit and is currently locked out
        $lockKey = 'otp_lock_' . $userId;
        $requestKey = 'otp_request_' . $userId;

        if (Cache::has($lockKey)) {
            $lockExpiresIn = Cache::get($lockKey);
            $remainingTime = intval(now()->diffInSeconds($lockExpiresIn));

            $this->alert('error', 'You have exceeded the maximum number of attempts. Please try again after ' . $remainingTime . ' seconds.');
            return;
        }

        // Check if the OTP is correct
        $verified = false;

        // If more than 3 attempts have been made
        if ($this->otp_attempts >= 3) {
            // Lock the user out for 5 minutes (300 seconds)


            Cache::put($lockKey, now()->addMinutes(5), now()->addMinutes(5));  // Lock for 5 minutes
            $this->alert('error', 'You have exceeded the maximum number of attempts. Please try again after 5 minutes.');
            return;
        }

        if ($this->otp_input == $this->otpdigis) {
            $verified = true;
            Cache::forget($lockKey);
            Cache::forget($requestKey);
            $this->alert('success', 'The OTP has been verified');
        } else {
            $this->otp_attempts++;  // Increment the attempt counter on failure
            if ($this->otp_attempts == 3) {
                Cache::put($lockKey, now()->addMinutes(5), now()->addMinutes(5));  // Lock for 5 minutes

                $this->alert('error', 'You have entered the incorrect OTP 3 times. Your account request function is locked for 5 minutes.');
                return;
            }
            $this->alert('error', 'The OTP is incorrect. Attempts remaining: ' . (3 - $this->otp_attempts));
        }

        // Dispatch the result

        if ($this->c_contact) {
            $value = $this->c_contact;
        } elseif ($this->contact) {
            $value = $this->contact;
        } elseif ($this->a_contact) {
            $value = $this->a_contact;
        }
        $this->dispatch('otp_result', $verified, $this->request_w,$value);

        // Optionally, reset attempts if verification is successful
        if ($verified) {
            $this->otp_attempts = 0;
        }
    }
    public function verifyMobile($request)
    {
        // Get the current user ID
        $this->request_w = $request;
        $userId = Auth::user()->id;

        if((!$this->c_contact && !$this->contact && !$this->a_contact)){
            $this->alert('error', 'Please input contact number');
            return;
        }
        if ($this->c_contact) {
            $value = $this->c_contact;
        } elseif ($this->contact) {
            $value = $this->contact;
        }elseif ($this->a_contact) {
            $value = $this->a_contact;
        }

        // Define the lock key (to track OTP requests within the last 10 minutes)
        $requestKey = 'otp_request_' . $userId;

        // Define the lock key for re-sending OTP within 5 minutes
        $lockKey = 'otp_lock_' . $userId;

        $otpRequestCount = Cache::get($requestKey, 0);

        if ($otpRequestCount >= 3) {
            $this->alert('error', 'You have exceeded the maximum number of OTP requests in the last 10 minutes. Please try again later.');
            return;
        }

        // Check if the user is locked out (cache exists for 5-minute restriction)
        if (Cache::has($lockKey)) {
            $lockExpiresIn = Cache::get($lockKey);
            $remainingTime = intval(now()->diffInSeconds($lockExpiresIn));
            $this->alert('error', 'You have reached the maximum retries. Please try again in ' . $remainingTime . ' seconds.');
            return;
        }

        // Check if the user has exceeded the 3 OTP requests within 10 minutes
      
        // Generate the OTP (6 digits)
        $otp = rand(100000, 999999);

        // Store the generated OTP in a property (to verify later)
        $this->otpdigis = $otp;

        // Prepare the message to be sent via Semaphore API
        $message = 'Your 6 digits OTP is ' . $otp . '. Please do not share this code with anyone. Thank you!';

        // Set up the API parameters
        $url = 'https://semaphore.co/api/v4/messages';
        $parameters = [
            'apikey'    => env('SEMAPHORE_API_KEY'),
            'number'    => $value,
            'message'   => $message,
            'sendername' => 'AlertME',
        ];

        // Initialize cURL
        $ch = curl_init();
   
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

             
        // $result = curl_exec($ch);
        // Execute the request
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            Log::error('Semaphore API cURL Error: ' . $error_msg);
            curl_close($ch);
            return response()->json(['error' => $error_msg], 500);
        }

        // Close cURL connection
        curl_close($ch);

        // Increment OTP request count in the cache, with an expiration of 10 minutes
        Cache::put($requestKey, $otpRequestCount + 1, now()->addMinutes(10));

        // Show message
        $this->alert('success', 'The OTP has been sent: ' . $otp);
        $this->dispatch('open_otp', true,$request);
    }

    public function activedog($id)
    {
        try {
            $this->dog_unique = $id;

            // Cache the query results forever using Cache::rememberForever
            $this->activedog = AnimalList::where('animal_lists.dog_id_unique', $id)
                ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
                ->leftJoin('animal_list_statuses', function ($join) {
                    $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
                        ->where('animal_list_statuses.isActive', '=', 1);
                })
                ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
                ->select('animal_lists.*', 'dog_breeds.name as breed_name', 'statuses.name as status_name')
                ->where('animal_lists.isActive', true)
                ->first();

            $this->dispatch('activedogModal', $this->activedog['status_name']);
        } catch (Throwable $r) {
        }
    }
    public function cancelPosing()
    {

        AnimalList::where('dog_id_unique', $this->dog_unique)->where('isActive', 1)->update(['isActive' => 0]);
        $this->dispatch('fetchdatanotif');
    }
    public function rejectDRequest()
    {
        AnimalListStatus::where('animal_id', $this->dog_unique)->where('isActive', 1)->update(['isActive' => 0]);

        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 9,
            'isActive' => 1,
        ]);

        $this->dispatch('reinnitdata');
    }
    public function approveDRequest()
    {

        AnimalListStatus::where('animal_id', $this->dog_unique)->where('isActive', 1)->update(['isActive' => 0]);

        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 2,
            'isActive' => 1,
        ]);

        $this->dispatch('reinnitdata');
    }
    public function editDoggo($id)
    {
        try {
            $finddog = AnimalList::where('dog_id_unique', $id)->where('isActive', 1)->first();
            $this->updatedog = true;
            $this->dog_unique = $id;
            $this->dogName = $finddog->dog_name;
            $this->breed = $finddog->breed;
            $this->color = $finddog->color;
            $this->gender = $finddog->gender;
            $this->description = $finddog->description;
            $this->previmages = $finddog->animal_images;
        } catch (Throwable $r) {
        }
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
        try {
            $images = [];
            $dog = null;
            if ($this->dogImages) {
                foreach ($this->dogImages as $image) {
                    $images[] = $image->store('dog-images', 'public'); // Save images in storage
                }
            }

            if ($this->dogName == '' || $this->breed == '' || $this->color == '' || $this->description == "") {
            } else {
                if ($this->dog_unique) {

                    AnimalList::where('dog_id_unique', $this->dog_unique)->update(['isActive' => 0]);

                    $data = [
                        'dog_name' => $this->dogName,
                        'dog_id_unique' => $this->dog_unique,
                        'breed' => $this->breed,
                        'color' => $this->color,
                        'gender' => $this->gender,
                        'location_found' => null,  // Adjust as needed
                        'date_found' => null,      // Adjust as needed
                        'description' => $this->description,
                        'isActive' => 1,
                    ];

                    if (!empty($images)) {
                        $data['animal_images'] = json_encode($images);
                    } else {
                        $data['animal_images'] = $this->previmages;
                    }
                    $dog = AnimalList::create($data);

                    $this->dispatch('dogSaved', 'Data has been successfully updated!');
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
        } catch (Throwable $r) {
        }
    }
    public function mount()
    {
        $this->breedlist = DogBreed::where('isActive', 1)->get();
    }
    public function render()
    {
        return view('livewire.modals-dogs');
    }
}
