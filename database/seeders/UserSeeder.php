<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;//for hash or encryption

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i <= 20; $i++) {
            User::create([
                "user_id" => 100 + $i."-".$i,
                "username" => $faker->name,
                "email" => $faker->email,
                "first_name" => $faker->firstNameMale,
                "middle_name" => $faker->lastName,
                "last_name" => $faker->lastName,
                "password" => Hash::make('password123'),
                "level" => "admin",
                "status" => 0,
                "remember_token" => Str::random(10, 'Webslesson')
            ]);
        }
        
    }
}
