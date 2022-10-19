<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Timetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Patient::factory(20)->create();

        $doctors = [
            [
                'hospital_id' => 1,
                'service_id' => 1,
                'name' => 'Drg. Andi Tajrin, Sp.BM',
                'image' => asset('image/doctors/tajrin.png'),
                'specialist' => 'Spesialis Bedah Mulut'
            ],
            [
                'hospital_id' => 1,
                'service_id' => 1,
                'name' => 'Drg. Ardian Jayakusuma, Sp.BM',
                'image' => asset('image/doctors/men_d.png'),
                'specialist' => 'Spesialis Bedah Mulut'
            ],
            [
                'hospital_id' => 1,
                'service_id' => 1,
                'name' => 'Drg. Chusnul Chotimah, Sp.Pros',
                'image' => asset('image/doctors/women_d.png'),
                'specialist' => 'Spesialis Prostodonsia',
            ],
            [
                'hospital_id' => 1,
                'service_id' => 1,
                'name' => 'Drg. Sultana Basalamah',
                'image' => asset('image/doctors/sultana.png'),
                'specialist' => 'Spesialis Dokter Gigi',
            ],
            [
                'hospital_id' => 1,
                'service_id' => 1,
                'name' => 'Drg. Sarahfin Aslan, Sp.KG',
                'image' => asset('image/doctors/women_d.png'),
                'specialist' => 'Spesialis Konservasi Gigi',
            ],
        ];

        $timetables = [
            [
                'doctor_id' => 1, 
                'day' => 'Senin',
                'start' => '08:00',
                'until' => '12:00',
                'max_quota' => 10,
                'quota' => 5,
            ],
            [
                'doctor_id' => 1, 
                'day' => 'Selasa',
                'start' => '08:00',
                'until' => '12:00',
                'max_quota' => 10,
                'quota' => 8,
            ],
        ];

        Doctor::insert($doctors);
        Timetable::insert($timetables);
    }
}
