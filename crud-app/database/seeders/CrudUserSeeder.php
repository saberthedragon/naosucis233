<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrudUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::query()->delete();

        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $number) {
            \App\Models\User::create([
                'name' => $faker->userName,
                'email' => $faker->email(),
                'password' => "MyDogSpot83",
                'role' => \App\Models\User::all()->pluck('id')->random(),
            ]);
        } // End of foreach
    }
}
