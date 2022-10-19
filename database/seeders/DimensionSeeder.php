<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Service;
use App\Models\Hospital;
use App\Models\HospitalService;
use App\Models\Polyclinic;
use App\Models\Rate;
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
        $service_category = [
            ['name' => 'poliklinik'],
            ['name' => 'unit gawat darurat (UGD)'],
            ['name' => 'instalasi gawat darurat (iGD)'],
            ['name' => 'radiologi'],
            ['name' => 'apotek'],
            ['name' => 'ultrasonografi'],
            ['name' => 'intensive care unit '],
        ];
        
        $polyclinics = [
            [
                
                'name' => 'poli gigi',
                'image' => 'poli_gigi.png',
            ],
            [
                'name' => 'poli gizi',
                'image' => 'poli_gizi.png',
            ],
            [
                'name' => 'poli penyakit dalam',
                'image' => 'poli_penyakit.png',
            ],
            [
                'name' => 'poli bedah umum',
                'image' => 'poli_bedah.png',
            ],
            [
                'name' => 'poli mata',
                'image' => 'poli_mata.png',
            ],
        ];

        $service = [
            [
                'polyclinic_id' => 1,
                'hospital_id' => 1,
                'rate' => 4.5
            ],
            [
                'polyclinic_id' => 1,
                'hospital_id' => 2,
                'rate' => 5
            ],
            [
                'polyclinic_id' => 1,
                'hospital_id' => 3,
                'rate' => 3
            ],
            [
                'polyclinic_id' => 1,
                'hospital_id' => 4,
                'rate' => 1
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

        $hospital_service = [
            [
                'service_id' => 1,
                'hospital_id' => 1,
                'rate' =>  2
            ],
            [
                'service_id' => 2,
                'hospital_id' => 1,
                'rate' =>  4
            ],
            [
                'service_id' => 3,
                'hospital_id' => 1,
                'rate' =>  3
            ],
            [
                'service_id' => 4,
                'hospital_id' => 1,
                'rate' =>  5
            ],
        ];

        $gender = [
            ['name' => 'laki laki'],
            ['name' => 'perempuan'],
        ];

        $rates = [
            [
                'patient_id' => 1,
                'service_id' => 1,
                'hospital_id' => 1,
                'rate' => 5,
                'comment' => 'Wah ini sangat baik'
            ],
            [
                'patient_id' => 2,
                'service_id' => 1,
                'hospital_id' => 1,
                'rate' => 5,
                'comment' => 'Lumayan bang'
            ],
            [
                'patient_id' => 3,
                'service_id' => 1,
                'hospital_id' => 1,
                'rate' => 3,
                'comment' => 'pen kesini lagi nih bang'
            ],
            [
                'patient_id' => 4,
                'service_id' => 1,
                'hospital_id' => 1,
                'rate' => 2,
                'comment' => 'ini rumah sakit?'
            ],
            [
                'patient_id' => 5,
                'service_id' => 1,
                'hospital_id' => 1,
                'rate' => 4,
                'comment' => 'Aowkowkwo iseng'
            ],
        ];

        Gender::insert($gender);
        // ServiceCategory::insert($service_category);
        Polyclinic::insert($polyclinics);
        Service::insert($service);
        Hospital::insert($hospitals);
        HospitalService::insert($hospital_service);
        Rate::insert($rates);
    }
}