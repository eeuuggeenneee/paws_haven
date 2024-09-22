<?php

namespace Database\Seeders;

use App\Models\AnimalList;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\AnimalListStatus;
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

        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'Sample Admin',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'email' => 'user@gmail.com',
            'name' => 'Sample User',
            'password' => bcrypt('user'),
            'role' => 'user'
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
                'animal_images' => json_encode([$faker->imageUrl(), $faker->imageUrl()]),
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

    }
}
