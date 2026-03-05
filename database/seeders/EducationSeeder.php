<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Education;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) return;

        $educations = [
            [
                'degree'         => 'Sarjana Teknik Komputer (S.T.)',
                'institution'    => 'Universitas Teknologi Nusantara',
                'field_of_study' => 'Teknik Komputer & Sistem Embedded',
                'gpa'            => 3.85,
                'gpa_max'        => 4.00,
                'start_date'     => Carbon::createFromDate(2019, 9, 1),
                'end_date'       => Carbon::createFromDate(2023, 8, 31),
                'order'          => 1,
            ],
            [
                'degree'         => 'Diploma III (D.III)',
                'institution'    => 'Politeknik Elektronika Negeri Surabaya',
                'field_of_study' => 'Elektronika & Instrumentasi',
                'gpa'            => 3.72,
                'gpa_max'        => 4.00,
                'start_date'     => Carbon::createFromDate(2016, 9, 1),
                'end_date'       => Carbon::createFromDate(2019, 8, 31),
                'order'          => 2,
            ],
            [
                'degree'         => 'Sekolah Menengah Atas (SMA)',
                'institution'    => 'SMAN 1 Indramayu',
                'field_of_study' => 'Ilmu Pengetahuan Alam (IPA)',
                'gpa'            => 88.50,
                'gpa_max'        => 100.00,
                'start_date'     => Carbon::createFromDate(2013, 7, 1),
                'end_date'       => Carbon::createFromDate(2016, 6, 30),
                'order'          => 3,
            ],
        ];

        foreach ($educations as $edu) {
            Education::updateOrCreate(
                [
                    'user_id'     => $user->id,
                    'institution' => $edu['institution'],
                ],
                array_merge($edu, ['user_id' => $user->id])
            );
        }

        $this->command->info(count($educations) . ' educations berhasil diseed.');
    }
}
