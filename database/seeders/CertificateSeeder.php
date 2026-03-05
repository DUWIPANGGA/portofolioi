<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Certificate;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) return;

        $certificates = [
            [
                'title'          => 'AWS Certified Solutions Architect – Associate',
                'issuer'         => 'Amazon Web Services (AWS)',
                'issue_date'     => Carbon::createFromDate(2024, 6, 15),
                'expiry_date'    => Carbon::createFromDate(2027, 6, 15),
                'credential_id'  => 'AWS-SAA-C03-2024-DIM',
                'credential_url' => 'https://aws.amazon.com/verification',
                'description'    => 'Sertifikasi resmi AWS untuk arsitektur solusi cloud scalable, highly available, dan fault-tolerant menggunakan layanan AWS core.',
                'is_active'      => true,
                'order'          => 1,
            ],
            [
                'title'          => 'Google Associate Android Developer',
                'issuer'         => 'Google Developers',
                'issue_date'     => Carbon::createFromDate(2024, 2, 20),
                'expiry_date'    => Carbon::createFromDate(2026, 2, 20),
                'credential_id'  => 'GAD-2024-DIMA-7821',
                'credential_url' => 'https://developers.google.com/certification',
                'description'    => 'Sertifikasi developer Android dari Google yang membuktikan kemampuan membangun dan mempublikasikan aplikasi Android profesional.',
                'is_active'      => true,
                'order'          => 2,
            ],
            [
                'title'          => 'Certified Flutter Developer',
                'issuer'         => 'Flutter Institute',
                'issue_date'     => Carbon::createFromDate(2023, 9, 10),
                'expiry_date'    => null,
                'credential_id'  => 'FLT-DEV-2023-1042',
                'credential_url' => 'https://flutterinstitute.io/verify',
                'description'    => 'Sertifikasi pengembangan aplikasi mobile cross-platform menggunakan Flutter & Dart, mencakup state management, UI, dan integrasi API.',
                'is_active'      => true,
                'order'          => 3,
            ],
            [
                'title'          => 'Embedded Systems and IoT Essentials',
                'issuer'         => 'Coursera – University of Colorado Boulder',
                'issue_date'     => Carbon::createFromDate(2023, 4, 5),
                'expiry_date'    => null,
                'credential_id'  => 'CRS-IOT-UCB-20230405',
                'credential_url' => 'https://coursera.org/verify/specialization',
                'description'    => 'Spesialisasi 5-kursus mencakup RTOS, hardware interfacing, komunikasi nirkabel, dan pengembangan produk IoT end-to-end.',
                'is_active'      => true,
                'order'          => 4,
            ],
            [
                'title'          => 'Laravel Certified Developer',
                'issuer'         => 'Laravel LLC',
                'issue_date'     => Carbon::createFromDate(2023, 7, 22),
                'expiry_date'    => null,
                'credential_id'  => 'LCD-2023-DIMA-4499',
                'credential_url' => 'https://laravelcert.com/verify',
                'description'    => 'Sertifikasi resmi Laravel yang menguji kemampuan membangun aplikasi PHP modern menggunakan framework Laravel secara profesional.',
                'is_active'      => true,
                'order'          => 5,
            ],
            [
                'title'          => 'Juara 1 – Hackathon IoT Nasional 2023',
                'issuer'         => 'Kementerian Kominfo RI',
                'issue_date'     => Carbon::createFromDate(2023, 11, 15),
                'expiry_date'    => null,
                'credential_id'  => 'HACK-IOT-KOM-2023-01',
                'credential_url' => null,
                'description'    => 'Penghargaan juara pertama Hackathon IoT Nasional 2023 kategori Smart Agriculture atas proyek sistem monitoring lahan cerdas berbasis ESP32.',
                'is_active'      => true,
                'order'          => 6,
            ],
            [
                'title'          => 'Python for Data Science and AI',
                'issuer'         => 'IBM / Coursera',
                'issue_date'     => Carbon::createFromDate(2022, 8, 30),
                'expiry_date'    => null,
                'credential_id'  => 'IBM-PYDS-2022-9841',
                'credential_url' => 'https://coursera.org/verify/ibm-python',
                'description'    => 'Penguasaan Python untuk analisis data, machine learning dasar, dan penerapan AI menggunakan library Pandas, NumPy, dan scikit-learn.',
                'is_active'      => true,
                'order'          => 7,
            ],
            [
                'title'          => 'Linux Foundation Certified SysAdmin (LFCS)',
                'issuer'         => 'The Linux Foundation',
                'issue_date'     => Carbon::createFromDate(2022, 5, 12),
                'expiry_date'    => Carbon::createFromDate(2025, 5, 12),
                'credential_id'  => 'LFCS-2022-DIMA-3310',
                'credential_url' => 'https://training.linuxfoundation.org/verify',
                'description'    => 'Sertifikasi administrasi sistem Linux mencakup manajemen file, user, network, security, dan scripting shell untuk production server.',
                'is_active'      => true,
                'order'          => 8,
            ],
            [
                'title'          => 'Finalis – INAICTA (Indonesia ICT Award) 2022',
                'issuer'         => 'Kementerian Kominfo RI',
                'issue_date'     => Carbon::createFromDate(2022, 10, 20),
                'expiry_date'    => null,
                'credential_id'  => 'INAICTA-2022-FIN-076',
                'credential_url' => null,
                'description'    => 'Finalis Indonesia ICT Award 2022 kategori Startup IoT atas inovasi platform smart monitoring energi rumah tangga berbasis cloud.',
                'is_active'      => true,
                'order'          => 9,
            ],
            [
                'title'          => 'Docker & Kubernetes Fundamentals',
                'issuer'         => 'KodeKloud / CNCF',
                'issue_date'     => Carbon::createFromDate(2024, 1, 8),
                'expiry_date'    => null,
                'credential_id'  => 'KK-DK-2024-DIMA-0108',
                'credential_url' => 'https://kodekloud.com/verify',
                'description'    => 'Penguasaan containerization menggunakan Docker dan orkestrasi container dengan Kubernetes untuk deployment aplikasi modern yang scalable.',
                'is_active'      => true,
                'order'          => 10,
            ],
        ];

        foreach ($certificates as $cert) {
            Certificate::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'title'   => $cert['title'],
                ],
                array_merge($cert, ['user_id' => $user->id])
            );
        }

        $this->command->info(count($certificates) . ' certificates berhasil diseed.');
    }
}
