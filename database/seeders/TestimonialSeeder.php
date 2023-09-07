<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            [
                'title' => 'Jane Doe',
                'subtitle' => 'Satisfied Home Buyer',
                'description' => 'I found my dream home through this website. The process was smooth, and the team was incredibly helpful.',
                'image' => 'testimonial_jane_doe.jpg',
            ],
            [
                'title' => 'John Smith',
                'subtitle' => 'Successful Property Seller',
                'description' => 'Selling my property was a breeze with the guidance of the real estate professionals here. Highly recommended.',
                'image' => 'testimonial_john_smith.jpg',
            ],
            [
                'title' => 'Sarah Johnson',
                'subtitle' => 'Happy Tenant',
                'description' => 'Renting a property was stress-free with the assistance of the responsive and friendly team. Thank you!',
                'image' => 'testimonial_sarah_johnson.jpg',
            ],
        ]);
    }
}
