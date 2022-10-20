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
                'image' => 'tajrin.png',
                'specialist' => 'Spesialis Bedah Mulut'
            ],
            [
                'hospital_id' => 1,
                'service_id' => 1,
                'name' => 'Drg. Ardian Jayakusuma, Sp.BM',
                'image' => 'men_d.png',
                'specialist' => 'Spesialis Bedah Mulut'
            ],
            [
                'hospital_id' => 1,
                'service_id' => 1,
                'name' => 'Drg. Chusnul Chotimah, Sp.Pros',
                'image' => 'women_d.png',
                'specialist' => 'Spesialis Prostodonsia',
            ],
            [
                'hospital_id' => 1,
                'service_id' => 1,
                'name' => 'Drg. Sultana Basalamah',
                'image' => 'sultana.png',
                'specialist' => 'Spesialis Dokter Gigi',
            ],
            [
                'hospital_id' => 1,
                'service_id' => 1,
                'name' => 'Drg. Sarahfin Aslan, Sp.KG',
                'image' => 'women_d.png',
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
            [
                'doctor_id' => 2, 
                'day' => 'Selasa',
                'start' => '08:00',
                'until' => '12:00',
                'max_quota' => 10,
                'quota' => 2,
            ],
            [
                'doctor_id' => 2, 
                'day' => 'Rabu',
                'start' => '08:00',
                'until' => '12:00',
                'max_quota' => 10,
                'quota' => 9,
            ],
            [
                'doctor_id' => 3, 
                'day' => 'Selasa',
                'start' => '08:00',
                'until' => '12:00',
                'max_quota' => 10,
                'quota' => 1,
            ],
        ];

        $patients = [
            [
                'gender_id' => 1,
                'name' => 'reza faisal',
                'nik' => '7401182802020001',
                'card_num' => '12345678',
                'birthday' => '2002-02-28'
            ],
            [
                'gender_id' => 1,
                'name' => 'muhammad asdar',
                'nik' => '8201182802020001',
                'card_num' => '65432112',
                'birthday' => '2001-09-10'
            ],
        ];
        
        Doctor::insert($doctors);
        Timetable::insert($timetables);
        Patient::insert($patients);
    }
}
