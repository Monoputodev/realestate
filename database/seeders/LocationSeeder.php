<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define an array of location names
        $locations = [
            'Dhaka',
            'Chittagong',
            'Barishal',
            'Cumilla',
            'Khulna',
        ];

        // Loop through the array and insert records into the 'locations' table
        foreach ($locations as $location) {
            DB::table('locations')->insert([
                'name' => $location,
                'status' => 1, // You can set the status as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
