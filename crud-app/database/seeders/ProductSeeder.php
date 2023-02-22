<?php

namespace Database\Seeders;

use Faker\Provider\en_US\Text;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() // Redeclared in "Main Seeder" ie: DatabaseSeeders
    {
        /*
        What this does -->
         
         * Deletes previous database
         
         * Recreates database
        
         * Iterates N times, to create that many entries
         
         * Create randomized data via "Faker"
        */

        \App\Models\Product::query()->delete();

        $faker = \Faker\Factory::create();

        foreach (range(1, 200) as $number) {
            \App\Models\Product::create([
                'name' => $faker->company,
                'price' => $faker->randomFloat(2, 0, 1000), // decimal(19, 4)
                'description' => $faker->text,
                'item_number' => $faker->numberBetween(100, 999),
                'image' => $faker->imageUrl(width: 50, height: 50),

                'product_id' => $faker->randomNumber()
            ]);
        } // End of foreach
    } // End of "Run" Function
}
