<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define an array of type names
        $types = [
            'Residential',
            'Comercial',
            'Office',
            'Suit',
        ];

        // Loop through the array and insert records into the 'types' table
        foreach ($types as $type) {
            DB::table('property_types')->insert([
                'name' => $type,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
