<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            HeroSeeder::class,
            ServiceSeeder::class,
            ContentSeeder::class,
            BlogSeeder::class,
            TestimonialSeeder::class,
            AwardSeeder::class,
            LocationSeeder::class,
            PropertyStatusSeeder::class,
            PropertyTypeSeeder::class,
        ]);
    }
}
