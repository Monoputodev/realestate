<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heroes = [
            [
                'title' => 'Find Your Dream Home',
                'subtitle' => 'Discover the perfect property that suits your needs',
                'image' => '1692782373.jpg',
                'status' => 1,
            ],
            [
                'title' => 'Sell Your Property with Ease',
                'subtitle' => 'List your property and reach potential buyers effortlessly',
                'image' => '1692782380.jpg',
                'status' => 1,
            ],
            [
                'title' => 'Expert Real Estate Services',
                'subtitle' => 'Trustworthy real estate professionals to guide you',
                'image' => '1692782386.jpg',
                'status' => 1,
            ],
        ];

        foreach ($heroes as $hero) {
            Hero::create($hero);
        }
    }
}
