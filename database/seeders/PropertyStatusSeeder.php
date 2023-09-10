<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define an array of status names
        $statuss = [
            'For Rent',
            'For Sale',
            'Sublate',
        ];

        // Loop through the array and insert records into the 'statuss' table
        foreach ($statuss as $status) {
            DB::table('property_statuses')->insert([
                'name' => $status,
                'status' => 1, // You can set the status as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
