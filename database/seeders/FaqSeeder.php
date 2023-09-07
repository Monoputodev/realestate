<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'question' => 'How do I list my property for sale?',
                'answer' => 'To list your property for sale, simply create an account on our platform and follow the easy steps to create a property listing. You can provide details about your property, upload images, and set the desired selling price.',
                'order' => 1,
                'status' => 1,
            ],
            [
                'question' => 'How can I find properties that match my criteria?',
                'answer' => 'You can use our advanced search filters to narrow down your property search based on your preferences. You can filter by location, property type, price range, and more to find properties that match your criteria.',
                'order' => 2,
                'status' => 1,
            ],
            [
                'question' => 'What is the process of buying a property?',
                'answer' => 'The process of buying a property involves several steps, including property search, property viewing, negotiation, offer acceptance, due diligence, and finally, the property closing. Our experienced agents will guide you through each step to ensure a smooth transaction.',
                'order' => 3,
                'status' => 1,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
