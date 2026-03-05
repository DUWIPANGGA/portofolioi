<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user pertama (atau sesuaikan dengan ID user yang kamu inginkan)
        $user = User::first();
        
        if (!$user) {
            $this->command->error('Tidak ada user ditemukan. Jalankan UserSeeder terlebih dahulu.');
            return;
        }

        $skills = [
            // Embedded & IoT Skills
            [
                'name' => 'ESP32',
                'percentage' => 90,
                'category' => 'embedded',
                'icon' => 'fa-solid fa-microchip',
                'order' => 1
            ],
            [
                'name' => 'Arduino',
                'percentage' => 95,
                'category' => 'embedded',
                'icon' => 'fa-solid fa-microchip',
                'order' => 2
            ],
            [
                'name' => 'Raspberry Pi',
                'percentage' => 85,
                'category' => 'embedded',
                'icon' => 'fa-solid fa-computer',
                'order' => 3
            ],
            [
                'name' => 'ESP8266',
                'percentage' => 88,
                'category' => 'embedded',
                'icon' => 'fa-solid fa-wifi',
                'order' => 4
            ],
            [
                'name' => 'STM32',
                'percentage' => 75,
                'category' => 'embedded',
                'icon' => 'fa-solid fa-microchip',
                'order' => 5
            ],
            
            // Mobile Development
            [
                'name' => 'Flutter',
                'percentage' => 85,
                'category' => 'mobile',
                'icon' => 'fa-brands fa-flutter',
                'order' => 6
            ],
            [
                'name' => 'Android (Kotlin)',
                'percentage' => 80,
                'category' => 'mobile',
                'icon' => 'fa-brands fa-android',
                'order' => 7
            ],
            [
                'name' => 'React Native',
                'percentage' => 75,
                'category' => 'mobile',
                'icon' => 'fa-brands fa-react',
                'order' => 8
            ],
            
            // Frontend Development
            [
                'name' => 'HTML5',
                'percentage' => 95,
                'category' => 'frontend',
                'icon' => 'fa-brands fa-html5',
                'order' => 9
            ],
            [
                'name' => 'CSS3',
                'percentage' => 90,
                'category' => 'frontend',
                'icon' => 'fa-brands fa-css3-alt',
                'order' => 10
            ],
            [
                'name' => 'JavaScript',
                'percentage' => 88,
                'category' => 'frontend',
                'icon' => 'fa-brands fa-js',
                'order' => 11
            ],
            [
                'name' => 'React.js',
                'percentage' => 85,
                'category' => 'frontend',
                'icon' => 'fa-brands fa-react',
                'order' => 12
            ],
            [
                'name' => 'Vue.js',
                'percentage' => 70,
                'category' => 'frontend',
                'icon' => 'fa-brands fa-vuejs',
                'order' => 13
            ],
            [
                'name' => 'Tailwind CSS',
                'percentage' => 92,
                'category' => 'frontend',
                'icon' => 'fa-solid fa-wind',
                'order' => 14
            ],
            [
                'name' => 'Bootstrap',
                'percentage' => 90,
                'category' => 'frontend',
                'icon' => 'fa-brands fa-bootstrap',
                'order' => 15
            ],
            
            // Backend Development
            [
                'name' => 'PHP',
                'percentage' => 88,
                'category' => 'backend',
                'icon' => 'fa-brands fa-php',
                'order' => 16
            ],
            [
                'name' => 'Laravel',
                'percentage' => 90,
                'category' => 'backend',
                'icon' => 'fa-brands fa-laravel',
                'order' => 17
            ],
            [
                'name' => 'Python',
                'percentage' => 80,
                'category' => 'backend',
                'icon' => 'fa-brands fa-python',
                'order' => 18
            ],
            [
                'name' => 'MySQL',
                'percentage' => 85,
                'category' => 'database',
                'icon' => 'fa-solid fa-database',
                'order' => 19
            ],
            [
                'name' => 'Firebase',
                'percentage' => 75,
                'category' => 'database',
                'icon' => 'fa-solid fa-fire',
                'order' => 20
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create([
                'user_id' => $user->id,
                'name' => $skill['name'],
                'percentage' => $skill['percentage'],
                'category' => $skill['category'],
                'icon' => $skill['icon'],
                'order' => $skill['order']
            ]);
        }

        $this->command->info('20 skill berhasil ditambahkan untuk user: ' . $user->name);
    }
}