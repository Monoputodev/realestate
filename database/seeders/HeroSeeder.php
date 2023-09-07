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
                'image' => 'hero_image1.jpg',
                'status' => 1,
            ],
            [
                'title' => 'Sell Your Property with Ease',
                'subtitle' => 'List your property and reach potential buyers effortlessly',
                'image' => 'hero_image2.jpg',
                'status' => 1,
            ],
            [
                'title' => 'Expert Real Estate Services',
                'subtitle' => 'Trustworthy real estate professionals to guide you',
                'image' => 'hero_image3.jpg',
                'status' => 1,
            ],
        ];

        foreach ($heroes as $hero) {
            Hero::create($hero);
        }
    }
}
