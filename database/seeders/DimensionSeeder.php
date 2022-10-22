<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Service;
use App\Models\Hospital;
use App\Models\HospitalService;
use App\Models\Polyclinic;
use App\Models\Rate;
use App\Models\Role;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'patient']
        ];
        
        $polyclinics = [
            [
                
                'name' => 'poli gigi',
                'image' => 'poli_gigi.png',
                'code' => 'A',
            ],
            [
                'name' => 'poli gizi',
                'image' => 'poli_gizi.png',
                'code' => 'B',
            ],
            [
                'name' => 'poli penyakit dalam',
                'image' => 'poli_penyakit.png',
                'code' => 'C',
            ],
            [
                'name' => 'poli bedah umum',
                'image' => 'poli_bedah.png',
                'code' => 'D',
            ],
            [
                'name' => 'poli mata',
                'image' => 'poli_mata.png',
                'code' => 'E',
            ],
        ];

        $hospitals = [
            [
                'name' => 'RS Ibnu Sina Makassar',
                'phone' => '(0411) 583333',
                'address' => 'Jl. Perintis Kemerdekaan No.11 Tamalanrea Jaya'
            ],
            [
                'name' => 'RSUD Haji Makassar',
                'phone' => '(0411) 856090',
                'address' => 'Jl. Daeng Ngeppe No.14 Balang Baru Kec. Tamalate'
            ],
            [
                'name' => 'RSUD Labuang Baji',
                'phone' => '(0411) 873482',
                'address' => 'Jl. Dr. Ratulangi No.81 Labuang Baji Kec. Mamajang'
            ],
            [
                'name' => 'RS Akademis Jaury',
                'phone' => '(0411) 317343',
                'address' => 'Jl. Jend. M. Jusuf No.57A Pattunuang Kec. Wajo'
            ],
            [
                'name' => 'RS Bhayangkara Makassar',
                'phone' => '(0411) 317343',
                'address' => 'Jl. Andi Mappaodang No.63 Jongaya Kec. Tamalate'
            ],
        ];

        $services = [];
        for ($i=1; $i <= 5; $i++) { 
            for ($j=1; $j <= 5 ; $j++) {
                array_push($services, 
                [
                    'polyclinic_id' => $i,
                    'hospital_id' => $j,
                    'rate' => rand(1, 5)
                ]);
            }
        }

        $gender = [
            ['name' => 'laki laki'],
            ['name' => 'perempuan'],
        ];


        Role::insert($roles);
        Gender::insert($gender);
        Polyclinic::insert($polyclinics);
        Service::insert($services);
        Hospital::insert($hospitals);
    }
}