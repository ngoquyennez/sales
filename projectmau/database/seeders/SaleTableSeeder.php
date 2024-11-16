<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        $medicineIDs=DB::table('medicines')->pluck('medicine_id');
        for($i=0;$i<5;$i++){
            $medicineID = $faker->randomElement($medicineIDs);
            DB::table('sales')->insert([
                'medicine_id' => $medicineID,
                'quantity' => $faker->numberBetween(0,10),
                'sale_date' => $faker->dateTime(),
                'customer_phone' => $faker->phoneNumber(),
               
            ]);
        }
    }
}
