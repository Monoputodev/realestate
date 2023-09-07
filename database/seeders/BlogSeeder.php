<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = [
            [
                'title' => 'The Future of Smart Homes',
                'subtitle' => 'Exploring the Impact of IoT on Real Estate',
                'description' => '<p>Discover how the Internet of Things (IoT) is revolutionizing the real estate industry with smart homes. Learn about the latest technologies, benefits, and challenges of integrating IoT devices in properties.</p>',
                'status' => '1',
                'image' => 'smart_homes.jpg',
            ],
            [
                'title' => 'Investing in Real Estate: Tips for Beginners',
                'subtitle' => 'A Guide to Getting Started in Real Estate Investment',
                'description' => '<p>If you\'re new to real estate investment, this blog post provides essential tips and strategies to help beginners navigate the real estate market. Learn about property types, financing options, and key factors to consider for a successful investment journey.</p>',
                'status' => '1',
                'image' => 'real_estate_investment.jpg',
            ],
            // Add more blogs here
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
