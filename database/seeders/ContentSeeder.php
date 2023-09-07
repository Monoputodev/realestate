<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $content = [
            'website_name' => 'Luxury Realty Group',
            'website_intro' => 'Your Trusted Partner in Real Estate',
            'website_description' => 'Discover the finest properties and exceptional real estate services.',
            'website_email' => 'info@luxuryrealtygroup.com',
            'website_phone' => '+1 (123) 456-7890',
            'website_address' => '456 Elite Avenue, Metropolis, Country',
            'about_content' => '<h4 class="title mb-4" style="font-family: Inter, sans-serif; letter-spacing: 0.5px; color: rgb(33, 37, 41); font-weight: 600 !important; line-height: 1.5 !important; font-size: 24px !important;">Experience Excellence in Real Estate</h4><p class="text-muted para-desc" style="line-height: 1.6; --bs-text-opacity: 1; max-width: 600px; font-family: Inter, sans-serif; font-size: 15px; color: rgb(132, 146, 166) !important;">Luxury Realty Group is your premier destination for luxury properties and personalized real estate services. Our team of experienced professionals is dedicated to helping you find the perfect home or investment that suits your unique needs and preferences.</p><p class="text-muted para-desc mb-0" style="line-height: 1.6; --bs-text-opacity: 1; max-width: 600px; font-family: Inter, sans-serif; font-size: 15px; color: rgb(132, 146, 166) !important;">Whether you\'re looking for a dream home, a prime commercial property, or a profitable investment opportunity, Luxury Realty Group is here to guide you every step of the way. Your satisfaction is our top priority.</p>',
            'about_image' => 'real_estate_about.png',
            'about_yt' => 'https:://youtube.com/luxuryrealty',
            'website_logo' => 'luxury_realty_logo.png',
            'website_favicon' => 'favicon.ico',

            'whatsapp' => '#whatsapp',
            'facebook' => '#facebook',
            'linkdin' => '#linkdin',
            'youtube' => '#youtube',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Content::create($content);
    }
}
