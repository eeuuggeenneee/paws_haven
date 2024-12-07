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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Throwable;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class AddLostDog extends Component
{
    use WithFileUploads;
    use LivewireAlert;

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

    public $images_uploded  = [];

    public $request_w;
    public $otpdigis;
    public $otp_attempts;
    public $otp_input;
    public $otp_related = false;
    protected $listeners = ['editDoggo', 'adddog'];
    public function mount()
    {
        $this->breedlist = DogBreed::where('isActive', 1)->get();
    }
    public function updateForm()
    {
        try {
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
                $finddog->barangay = $this->barangay_f;
                $finddog->location_found = $this->location_found;
                $finddog->date_found = $this->date_found;
                $finddog->description = $this->description;
                $finddog->contact_name = $this->contact_name;
                $finddog->contact_number = $this->contact_number;
                $finddog->isActive = 1;
                $finddog->save();
            }
        } catch (Throwable $r) {
        }
        $this->clearDogImages();
        $this->dispatch('dogUpdate', 'Data has been successfully updated!');
    }
    public function checkOTP()
    {
        $this->otp_related = true;
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

        $this->dispatch('otp_result2', $verified, $this->request_w, $this->contact_number);

        // Optionally, reset attempts if verification is successful
        if ($verified) {
            $this->otp_attempts = 0;
        }
    }
    public function verifyMobile($request)
    {
        $this->otp_related = true;

        // Get the current user ID
        $this->request_w = $request;
        $userId = Auth::user()->id;

        if (!$this->contact_number) {
            $this->alert('error', 'Please input contact number');
            return;
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
            'number'    => $this->contact_number,
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
            curl_close($ch);
            return response()->json(['error' => $error_msg], 500);
        }

        // Close cURL connection
        curl_close($ch);

        // Increment OTP request count in the cache, with an expiration of 10 minutes
        Cache::put($requestKey, $otpRequestCount + 1, now()->addMinutes(10));

        // Show message
        $this->alert('success', 'The OTP has been sent: ' . $otp);
        $this->dispatch('open_otp', true, $request);
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
        try {
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
        } catch (Throwable $r) {
        }
    }
    public function submitForm()
    {
        try {

            $dogImages = session()->get('dog_images', []);
            $uniqueId = Str::uuid();


            if (Auth::user()->type == 1) {
                $this->report_type = 3;
            } else {
                $this->report_type = 2;
            }

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
        } catch (Throwable $r) {
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
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filePath = $file->store('animal_images', 'public');

                // Retrieve and update the session data
                $dogImages = session()->get('dog_images', []);
                $dogImages[] = $filePath;
                session()->put('dog_images', $dogImages);
                $this->images_uploded = $dogImages;

                return response()->json([
                    'filePath' => $filePath,
                    'message' => 'File uploaded successfully!'
                ]);
            }
        } catch (Throwable $r) {
            return response()->json([
                'message' => 'No file uploaded.'
            ], 400);
        }
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
