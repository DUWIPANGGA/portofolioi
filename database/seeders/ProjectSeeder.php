<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // Assuming at least one user exists
        if (!$user) return;

        // Mendapatkan ID teknologi yang tersedia
        $techIds = \App\Models\Technology::pluck('id')->toArray();
        if (empty($techIds)) {
            // Setup dummy tech ID array just in case TechnologySeeder hasn't run
            $techIds = [1, 2, 3];
        }

        $projects = [
            [
                'title' => 'Smart Home Automation System',
                'description' => 'A comprehensive IoT solution for managing home appliances via a central web dashboard and mobile app, featuring real-time energy monitoring and automated schedules.',
                'client' => 'Tech Solutions Inc.',
                'image_path' => 'projects/dummy-1.jpg',
                'is_featured' => true,
                'project_date' => '2025-01-15',
                'demo_url' => 'https://demo.example.com',
                'case_study_url' => '#',
                'technologies' => json_encode(array_rand(array_flip($techIds), min(4, count($techIds))))
            ],
            [
                'title' => 'E-Commerce Marketplace',
                'description' => 'A scalable multi-vendor e-commerce platform built with modern architectural patterns, supporting thousands of concurrent users and integrating redundant payment gateways.',
                'client' => 'Global Retailers LLC',
                'image_path' => 'projects/dummy-2.jpg',
                'is_featured' => true,
                'project_date' => '2024-11-20',
                'demo_url' => 'https://shop.example.com',
                'case_study_url' => '#',
                'technologies' => json_encode(array_rand(array_flip($techIds), min(5, count($techIds))))
            ],
            [
                'title' => 'IoT Weather Station Network',
                'description' => 'A network of custom-built, Arduino-based weather stations capturing micro-climate data and reporting it via MQTT to a central resilient cloud backend for visualization and analysis.',
                'client' => 'AgriTech Analytics',
                'image_path' => 'projects/dummy-3.jpg',
                'is_featured' => false,
                'project_date' => '2024-06-10',
                'demo_url' => 'https://weather.example.com',
                'case_study_url' => '#',
                'technologies' => json_encode(array_rand(array_flip($techIds), min(3, count($techIds))))
            ],
            [
                'title' => 'Personal Portfolio Template',
                'description' => 'A highly customizable, blazing fast portfolio template designed specifically for developers. Features dark mode, automated SEO, and a flexible project showcase system.',
                'client' => 'Open Source',
                'image_path' => 'projects/dummy-4.jpg',
                'is_featured' => false,
                'project_date' => '2025-02-05',
                'demo_url' => 'https://portfolio.example.com',
                'case_study_url' => '#',
                'technologies' => json_encode(array_rand(array_flip($techIds), min(3, count($techIds))))
            ]
        ];

        foreach ($projects as $index => $project) {
            Project::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'slug' => Str::slug($project['title'])
                ],
                array_merge($project, ['order' => $index])
            );
        }
    }
}
