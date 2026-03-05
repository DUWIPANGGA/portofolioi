<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Experience;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        
        if (!$user) {
            $this->command->error('Tidak ada user ditemukan. Jalankan UserSeeder terlebih dahulu.');
            return;
        }

        $experiences = [
            [
                'position' => 'Senior IoT & Firmware Engineer',
                'company' => 'SmartTech Solutions Nusantara',
                'description' => 'Memimpin tim R&D dalam mengembangkan arsitektur firmware untuk perangkat smart home berbasis ESP32. Mengurangi latensi komunikasi device-to-cloud hingga 40% menggunakan protokol MQTT yang dioptimalkan.',
                'start_date' => Carbon::createFromDate(2023, 1, 15),
                'end_date' => null,
                'is_current' => true,
                'order' => 1
            ],
            [
                'position' => 'Full Stack Web Developer',
                'company' => 'Digital Transformasi Indonesia',
                'description' => 'Membangun dashboard monitoring IoT secara real-time menggunakan Laravel dan Vue.js yang dapat melacak lebih dari 10.000 sensor secara bersamaan. Mengimplementasikan antarmuka responsif dan secure API.',
                'start_date' => Carbon::createFromDate(2021, 5, 20),
                'end_date' => Carbon::createFromDate(2022, 12, 31),
                'is_current' => false,
                'order' => 2
            ],
            [
                'position' => 'Mobile App Developer',
                'company' => 'AppStudio Jakarta',
                'description' => 'Mengembangkan aplikasi lintas platform untuk manajemen armada kendaraan berbasis Flutter. Mengintegrasikan layanan peta dan pelacakan GPS secara native yang digunakan oleh lebih dari 500 pengemudi harian.',
                'start_date' => Carbon::createFromDate(2019, 8, 10),
                'end_date' => Carbon::createFromDate(2021, 4, 15),
                'is_current' => false,
                'order' => 3
            ],
            [
                'position' => 'Backend Software Engineer',
                'company' => 'FinTech Innovators',
                'description' => 'Mendesain arsitektur microservices untuk aplikasi pinjaman online. Mengelola database berskala besar, mengoptimalkan query MySQL, dan membangun sistem penagihan otomatis.',
                'start_date' => Carbon::createFromDate(2018, 3, 1),
                'end_date' => Carbon::createFromDate(2019, 7, 30),
                'is_current' => false,
                'order' => 4
            ],
            [
                'position' => 'Junior Embedded Hardware Developer',
                'company' => 'AutoMakers Electronics',
                'description' => 'Merancang rangkaian PCB sederhana untuk sistem otomasi manufaktur. Membantu penulisan kode dasar pada sistem mikrokontroler STM32 dan Raspberry Pi untuk robot industri.',
                'start_date' => Carbon::createFromDate(2017, 2, 15),
                'end_date' => Carbon::createFromDate(2018, 2, 28),
                'is_current' => false,
                'order' => 5
            ],
            [
                'position' => 'IT Software Intern',
                'company' => 'Kementerian Komunikasi dan Informatika',
                'description' => 'Magang di departemen infrastruktur digital. Membantu pengembangan website portal berita internal menggunakan PHP dan Bootstrap, serta menangani troubleshooting jaringan.',
                'start_date' => Carbon::createFromDate(2016, 6, 1),
                'end_date' => Carbon::createFromDate(2016, 11, 30),
                'is_current' => false,
                'order' => 6
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create([
                'user_id' => $user->id,
                'position' => $experience['position'],
                'company' => $experience['company'],
                'description' => $experience['description'],
                'start_date' => $experience['start_date'],
                'end_date' => $experience['end_date'],
                'is_current' => $experience['is_current'],
                'order' => $experience['order']
            ]);
        }

        $this->command->info('6 pengalaman kerja berhasil ditambahkan untuk user: ' . $user->name);
    }
}
