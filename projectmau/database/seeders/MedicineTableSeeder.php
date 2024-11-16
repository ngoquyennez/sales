<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for($i=0;$i<5;$i++){
            DB::table('medicines')->insert([
                'name' => $faker->name,
                'brand' => $faker->randomElement(['Việt Nam','Đức','Anh','Pháp']),
                'dosage' => $faker->sentence(),
                'form' => $faker->randomElement(['viên nén','viên nang','xi rô']),
                'price' => $faker->numberBetween(0,10),
                'stock' => $faker->numberBetween(0,10),
            ]);
        }
    }
}
