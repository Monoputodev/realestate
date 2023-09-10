<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch location, property status, and property type IDs where status is 1
        $locationId = DB::table('locations')->where('status', 1)->value('id');
        $propertyStatusId = DB::table('property_statuses')->where('status', 1)->value('id');
        $propertyTypeId = DB::table('property_types')->where('status', 1)->value('id');

        // Define an array of sample project data for 10 projects
        $projects = [];

        for ($i = 1; $i <= 10; $i++) {
            $projects[] = [
                'title' => "Project $i",
                'image' => "project$i.jpg",
                'thumbnail' => "project{$i}_thumb.jpg",
                'subtitle' => "Subtitle for Project $i",
                'location' => $locationId,
                'propertystatus' => $propertyStatusId,
                'propertytype' => $propertyTypeId,
                'apartment_size' => '1200 sq. ft.',
                'bedroom' => '3 Bedrooms',
                'completion_date' => '2023-12-31',
                'experience' => "Description of Project $i",
                'features' => "Features of Project $i",
                'brochure' => "project{$i}_brochure.pdf",
                'floor_plan' => "project{$i}_floor_plan.pdf",
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Shuffle the projects array to randomize their order
        shuffle($projects);

        // Loop through the shuffled array and insert records into the 'projects' table
        foreach ($projects as $project) {
            DB::table('projects')->insert($project);
        }
    }
}
