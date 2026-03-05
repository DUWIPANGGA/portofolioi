<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) return;

        $testimonials = [
            [
                'client_name'     => 'Budi Santoso',
                'client_position' => 'CTO',
                'client_company'  => 'SmartTech Solutions',
                'content'         => 'Dimas berhasil membangun sistem IoT kami dari nol dan hasilnya melampaui ekspektasi. Firmware-nya sangat stabil, dashboard monitoring real-time-nya sangat intuitif digunakan. Tim kami sangat puas dengan kualitas kerja dan profesionalismenya.',
                'rating'          => 5,
                'is_featured'     => true,
                'order'           => 1,
            ],
            [
                'client_name'     => 'Siti Rahayu',
                'client_position' => 'Product Manager',
                'client_company'  => 'FinTech Innovators',
                'content'         => 'Aplikasi mobile yang dibangun Dimas menggunakan Flutter sangat responsif dan desainnya elegan. Integrasi dengan backend Laravel berjalan mulus. Ia sangat detail dalam dokumentasi API dan menyelesaikan proyek tepat waktu.',
                'rating'          => 5,
                'is_featured'     => true,
                'order'           => 2,
            ],
            [
                'client_name'     => 'Ahmad Fauzi',
                'client_position' => 'Founder & CEO',
                'client_company'  => 'AgriTech Analytics',
                'content'         => 'Jaringan weather station yang dibangun Dimas menggunakan ESP32 dan MQTT benar-benar mengubah cara kami memantau kondisi lahan pertanian. Data akurat, pengiriman real-time, dan sistem sangat andal bahkan di kondisi cuaca ekstrem.',
                'rating'          => 5,
                'is_featured'     => true,
                'order'           => 3,
            ],
            [
                'client_name'     => 'Reza Pratama',
                'client_position' => 'Lead Developer',
                'client_company'  => 'Digital Transformasi Indonesia',
                'content'         => 'Saya bekerja sama dengan Dimas selama hampir 2 tahun. Kemampuan full-stack-nya luar biasa — sama nyamannya menulis kode firmware C++ maupun membangun UI dengan Vue.js. Sangat direkomendasikan untuk proyek teknis yang kompleks.',
                'rating'          => 5,
                'is_featured'     => false,
                'order'           => 4,
            ],
            [
                'client_name'     => 'Maya Anggraeni',
                'client_position' => 'Operations Director',
                'client_company'  => 'AppStudio Jakarta',
                'content'         => 'Platform manajemen armada yang Dimas kembangkan memiliki UX yang sangat baik dan backend yang solid. Lebih dari 500 driver aktif menggunakannya setiap hari tanpa kendala. Kerjanya profesional dan komunikasinya sangat baik.',
                'rating'          => 4,
                'is_featured'     => false,
                'order'           => 5,
            ],
            [
                'client_name'     => 'Dr. Hendro Wibowo',
                'client_position' => 'Research Lead',
                'client_company'  => 'Universitas Teknologi Nusantara',
                'content'         => 'Dimas membantu tim riset kami mengembangkan prototipe sistem embedded untuk monitoring lingkungan. Pengetahuannya di bidang elektronika dan programming sangat mendalam, dan ia mampu menjelaskan konsep teknis yang rumit dengan cara yang mudah dipahami.',
                'rating'          => 5,
                'is_featured'     => false,
                'order'           => 6,
            ],
            [
                'client_name'     => 'Kevin Halim',
                'client_position' => 'Startup Founder',
                'client_company'  => 'NusaHome Automation',
                'content'         => 'Sistem smart home yang Dimas bangun untuk startup kami sangat mengesankan. Mulai dari hardware, firmware, backend API, sampai aplikasi mobile semuanya dikerjakan dengan standar kualitas tinggi. Benar-benar one-stop developer andalan kami.',
                'rating'          => 5,
                'is_featured'     => true,
                'order'           => 7,
            ],
            [
                'client_name'     => 'Lia Kusumawati',
                'client_position' => 'IT Manager',
                'client_company'  => 'Kementerian Kominfo',
                'content'         => 'Dimas magang di departemen kami dan memberikan kontribusi yang signifikan dalam pengembangan portal web internal. Meski masih muda, kemampuan teknisnya sudah sangat matang dan attitude-nya sangat profesional.',
                'rating'          => 4,
                'is_featured'     => false,
                'order'           => 8,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                [
                    'user_id'     => $user->id,
                    'client_name' => $testimonial['client_name'],
                ],
                array_merge($testimonial, ['user_id' => $user->id])
            );
        }

        $this->command->info(count($testimonials) . ' testimonials berhasil diseed.');
    }
}
