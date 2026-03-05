<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create default user if not exists
        if (User::where('email', 'aryad2232@gmail.com')->doesntExist()) {
            User::factory()->create([
                'name' => 'dimas arya duwipangga',
                'email' => 'aryad2232@gmail.com',
                'role' => 'admin',
            ]);
        }

        $this->call([
            TechnologySeeder::class,
            ProjectSeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            EducationSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
            CertificateSeeder::class,
        ]);
    }
}
