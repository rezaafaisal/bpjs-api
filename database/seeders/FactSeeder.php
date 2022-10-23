<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Officer;
use App\Models\Patient;
use App\Models\Timetable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $passwd = Hash::make('passwd');
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

        $users = [
            [
                'role_id' => 2,
                'name' => 'Muhammad Asdar',
                'nik' => '60200119029',
                'password' => $passwd
            ],
            [
                'role_id' => 2,
                'name' => 'Adhiet Firmasnyah',
                'nik' => '60200119060',
                'password' => $passwd
            ],
            [
                'role_id' => 2,
                'name' => 'Reza Faisal',
                'nik' => '60200119075',
                'password' => $passwd
            ],
            [
                'role_id' => 2,
                'name' => 'Balmond',
                'nik' => '12345',
                'password' => $passwd
            ],
            [
                'role_id' => 2,
                'name' => 'Argus',
                'nik' => '54321',
                'password' => $passwd
            ],
            [
                'role_id' => 1,
                'name' => 'Indah Deana',
                'nik' => '60200119010',
                'password' => $passwd
            ]
        ];

        $patients = [
            [
                'gender_id' => 1,
                'user_id' => 1,
                'bpjs_number' => '1111111',
                'birthday' => '2002-02-28'
            ],
            [
                'gender_id' => 1,
                'user_id' => 2,
                'bpjs_number' => '22222222',
                'birthday' => '2001-09-10'
            ],
            [
                'gender_id' => 1,
                'user_id' => 3,
                'bpjs_number' => '33333333',
                'birthday' => '2003-02-19'
            ],
            [
                'gender_id' => 1,
                'user_id' => 4,
                'bpjs_number' => '33333333',
                'birthday' => '2003-02-19'
            ],
            [
                'gender_id' => 1,
                'user_id' => 5,
                'bpjs_number' => '33333333',
                'birthday' => '2003-02-19'
            ],
        ];

        $officer = [
            [
                'user_id' => 6,
                'hospital_id' => 1
            ]
        ];


        
        User::insert($users);
        Doctor::insert($doctors);
        Timetable::insert($timetables);
        Patient::insert($patients);
        Officer::insert($officer);
    }
}
