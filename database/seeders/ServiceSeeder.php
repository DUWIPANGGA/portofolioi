<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) return;

        $services = [
            [
                'title' => 'Embedded Systems Development',
                'icon' => 'fas fa-microchip',
                'description' => 'Desain dan pengembangan firmware untuk mikrokontroler ESP32, Arduino, STM32, dan Raspberry Pi. Meliputi IoT, sensor integration, dan real-time control systems.',
                'order' => 1,
            ],
            [
                'title' => 'Full Stack Web Development',
                'icon' => 'fas fa-layer-group',
                'description' => 'Membangun aplikasi web end-to-end menggunakan Laravel, React, dan Vue.js. Mencakup REST API, database design, authentication, dan deployment.',
                'order' => 2,
            ],
            [
                'title' => 'Mobile App Development',
                'icon' => 'fas fa-mobile-alt',
                'description' => 'Membuat aplikasi mobile cross-platform menggunakan Flutter & Dart. Integrasi dengan firebase, REST API, dan native device features (GPS, kamera, Bluetooth).',
                'order' => 3,
            ],
            [
                'title' => 'IoT Dashboard & Monitoring',
                'icon' => 'fas fa-tachometer-alt',
                'description' => 'Membangun dashboard real-time untuk monitoring data sensor IoT menggunakan WebSocket, MQTT, dan visualisasi data interaktif dengan Chart.js atau D3.js.',
                'order' => 4,
            ],
            [
                'title' => 'UI/UX Design',
                'icon' => 'fas fa-palette',
                'description' => 'Merancang antarmuka yang modern, intuitif, dan responsif. Menggunakan Figma untuk prototyping dan mengimplementasikan desain yang berfokus pada pengalaman pengguna.',
                'order' => 5,
            ],
            [
                'title' => 'PCB & Hardware Design',
                'icon' => 'fas fa-drafting-compass',
                'description' => 'Desain rangkaian elektronik dan PCB custom menggunakan KiCad dan Altium Designer. Meliputi schematic, layout, dan BOM management untuk produk elektronik.',
                'order' => 6,
            ],
            [
                'title' => 'DevOps & Cloud Infrastructure',
                'icon' => 'fas fa-cloud',
                'description' => 'Setup dan manajemen server Linux, Docker containerization, CI/CD pipeline, dan deployment ke AWS/VPS. Memastikan aplikasi berjalan stabil dan scalable.',
                'order' => 7,
            ],
            [
                'title' => 'Technical Consultation',
                'icon' => 'fas fa-comments',
                'description' => 'Konsultasi teknis untuk proyek IoT, arsitektur sistem, pemilihan teknologi, code review, dan mentoring tim development junior.',
                'order' => 8,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['user_id' => $user->id, 'title' => $service['title']],
                array_merge($service, ['user_id' => $user->id])
            );
        }

        $this->command->info(count($services) . ' services berhasil diseed.');
    }
}
