<?php

namespace Database\Seeders;

use App\Models\AnimalList;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\AnimalListStatus;
use App\Models\Annoucement;
use App\Models\DogBreed;
use App\Models\Status;
use Illuminate\Support\Str;

use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $status = ['For Adoption','Lost Dog', 'Found Dog', 'Pending Adoption', 'Adopted','Pending Claim','Claimed'];

        foreach($status as $s){
            Status::create([
                'name' => $s
            ]);
        }


        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'Sample Admin',
            'password' => bcrypt('admin'),
            'type' => '1'
        ]);

        User::create([
            'email' => 'user@gmail.com',
            'name' => 'Sample User',
            'password' => bcrypt('user'),
            'type' => '0'
        ]);

      
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $uniqueId = Str::uuid();

            AnimalList::create([
                'dog_name' => $faker->firstName,
                'dog_id_unique' => $uniqueId,
                'breed' => $faker->randomElement(['Labrador', 'Golden Retriever', 'Beagle', 'Bulldog']),
                'color' => $faker->randomElement(['Black', 'Brown', 'White', 'Golden']),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'location_found' => $faker->city,
                'date_found' => $faker->date(),
                'description' => $faker->sentence(),
                'report_type' => $faker->numberBetween(1, 2), // 1 for lost, 2 for found
                'animal_images' => json_encode(["dog-images\/0GfcIpDwW6ANhPDl74mvmo5lDILaliFGIoAYIMvI.jpg","dog-images\/0KJV7nuNvbHGe0s5qAu9oi1l9aKYmmDDm8G3yLID.webp"]),
                'contact_name' => $faker->name,
                'contact_number' => $faker->phoneNumber,
                'isActive' => 1,
            ]);

            AnimalListStatus::create([
                'animal_id' => $uniqueId, 
                'status' => 1, 
                'isActive' => 1,
            ]);
        }


        $dogBreeds = [
            "American Bully",
            "Aspin",
            "Beagle",
            "Boxer",
            "Bulldog",
            "Chihuahua",
            "Dachshund",
            "Dobermann",
            "French Bulldog",
            "German Shepherd",
            "Great Dane",
            "Poodle",
            "Shiba Inu",
            "ShihtzFu",
            "Siberian Husky"
        ];

        foreach($dogBreeds as $breeds){
            DogBreed::create([
                'name' => $breeds,
                'isActive' => 1,
            ]);
        }


        Annoucement::create([
            'message' => '<div class="ql-editor" contenteditable="true"><h3><span class="ql-size-large">Hello World!</span></h3><p><br></p><h3>This is an simple editable area.</h3><p><br></p><ul><li>Select a text to reveal the toolbar.</li><li>Edit rich document on-the-fly, so elastic!</li></ul><p><br></p><p>End of simple area</p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>',
            'title' => 'Hello World!',
            'sub_title' => 'This is an simple editable area.',
            'user_id' => 1,
            'isActive' => 1,
        ]);

    }
}
