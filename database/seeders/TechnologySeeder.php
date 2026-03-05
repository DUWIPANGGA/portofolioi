<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Models\User;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // Assuming at least one user exists
        if (!$user) return;

        $technologies = [
            ['name' => 'Arduino', 'icon' => 'fas fa-microchip', 'category' => 'hardware', 'is_checked' => true],
            ['name' => 'Flutter', 'icon' => 'fas fa-mobile-alt', 'category' => 'mobile', 'is_checked' => true],
            ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'category' => 'backend', 'is_checked' => true],
            ['name' => 'PHP', 'icon' => 'fab fa-php', 'category' => 'backend', 'is_checked' => true],
            ['name' => 'JavaScript', 'icon' => 'fab fa-js', 'category' => 'frontend', 'is_checked' => true],
            ['name' => 'React', 'icon' => 'fab fa-react', 'category' => 'frontend', 'is_checked' => false],
            ['name' => 'Vue.js', 'icon' => 'fab fa-vuejs', 'category' => 'frontend', 'is_checked' => false],
            ['name' => 'Node.js', 'icon' => 'fab fa-node', 'category' => 'backend', 'is_checked' => true],
            ['name' => 'Python', 'icon' => 'fab fa-python', 'category' => 'backend', 'is_checked' => true],
            ['name' => 'C++', 'icon' => 'fas fa-code', 'category' => 'backend', 'is_checked' => true],
            ['name' => 'HTML5', 'icon' => 'fab fa-html5', 'category' => 'frontend', 'is_checked' => true],
            ['name' => 'CSS3', 'icon' => 'fab fa-css3-alt', 'category' => 'frontend', 'is_checked' => true],
            ['name' => 'MySQL', 'icon' => 'fas fa-database', 'category' => 'database', 'is_checked' => true],
            ['name' => 'PostgreSQL', 'icon' => 'fas fa-database', 'category' => 'database', 'is_checked' => true],
            ['name' => 'Docker', 'icon' => 'fab fa-docker', 'category' => 'tool', 'is_checked' => false],
            ['name' => 'Git', 'icon' => 'fab fa-git-alt', 'category' => 'tool', 'is_checked' => true],
            ['name' => 'AWS', 'icon' => 'fab fa-aws', 'category' => 'tool', 'is_checked' => false],
            ['name' => 'Linux', 'icon' => 'fab fa-linux', 'category' => 'tool', 'is_checked' => true],
            ['name' => 'TailwindCSS', 'icon' => 'fas fa-paint-roller', 'category' => 'frontend', 'is_checked' => true],
            ['name' => 'Figma', 'icon' => 'fab fa-figma', 'category' => 'design', 'is_checked' => true],
        ];

        foreach ($technologies as $index => $tech) {
            Technology::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'name' => $tech['name']
                ],
                [
                    'icon' => $tech['icon'],
                    'category' => $tech['category'],
                    'is_checked' => $tech['is_checked'],
                    'order' => $index,
                ]
            );
        }
    }
}
