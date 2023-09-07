<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // Seed the awards table with sample data
        $awards = [
            [
                'title' => 'Best Designer',
                'subtitle' => 'Design Excellence Award',
                'description' => 'Recognizing outstanding design work.',
                'slug' => 'best-designer',
                'image' => 'design.jpg',
                'ranking' => 1,
                'status' => '1',
            ],
            [
                'title' => 'Top Writer',
                'subtitle' => 'Writing Achievement Award',
                'description' => 'Acknowledging exceptional writing skills.',
                'slug' => 'top-writer',
                'image' => 'writing.jpg',
                'ranking' => 2,
                'status' => '1',
            ],
            // Add more awards as needed
        ];

        // Insert the seed data into the awards table
        Award::insert($awards);
    }
}
