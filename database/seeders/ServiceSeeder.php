<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'title' => 'Residential Properties',
                'subtitle' => 'Find Your Ideal Home',
                'description' => 'Discover a wide range of residential properties including apartments, houses, and condos.',
                'image' => 'residential_properties.jpg',
                'ranking' => 1,
                'status' => 1,
                'created_at' => '2023-07-03 10:00:00',
                'updated_at' => '2023-07-03 10:00:00',
            ],
            [
                'title' => 'Commercial Real Estate',
                'subtitle' => 'Grow Your Business with the Right Space',
                'description' => 'Explore commercial real estate options such as office spaces, retail locations, and industrial properties.',
                'image' => 'commercial_real_estate.jpg',
                'ranking' => 2,
                'status' => 1,
                'created_at' => '2023-07-03 10:00:00',
                'updated_at' => '2023-07-03 10:00:00',
            ],
            [
                'title' => 'Property Management',
                'subtitle' => 'Efficient Management for Your Properties',
                'description' => 'Benefit from professional property management services to handle maintenance, tenant relations, and more.',
                'image' => 'property_management.jpg',
                'ranking' => 3,
                'status' => 1,
                'created_at' => '2023-07-03 10:00:00',
                'updated_at' => '2023-07-03 10:00:00',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
