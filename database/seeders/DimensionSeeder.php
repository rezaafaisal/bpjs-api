<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Service;
use App\Models\Hospital;
use App\Models\HospitalService;
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

        $service = [
            [
                'service_category_id' => 1,
                'name' => 'poli gigi',
                'image' => 'poli_gigi.png',
            ],
            [
                'service_category_id' => 1,
                'name' => 'poli gizi',
                'image' => 'poli_gizi.png',
            ],
            [
                'service_category_id' => 1,
                'name' => 'poli penyakit dalam',
                'image' => 'poli_penyakit.png',
            ],
            [
                'service_category_id' => 1,
                'name' => 'poli bedah umum',
                'image' => 'poli_bedah.png',
            ],
            [
                'service_category_id' => 1,
                'name' => 'poli mata',
                'image' => 'poli_mata.png',
            ],
        ];

        $hospitals = [
            [
                'name' => 'RS Ibnu Sina Makassar',
                'rate' => 5,
                'reviewer' => 20,
                'phone' => '(0411) 583333',
                'address' => 'Jl. Perintis Kemerdekaan No.11 Tamalanrea Jaya'
            ],
            [
                'name' => 'RSUD Haji Makassar',
                'rate' => 4.3,
                'reviewer' => 20,
                'phone' => '(0411) 856090',
                'address' => 'Jl. Daeng Ngeppe No.14 Balang Baru Kec. Tamalate'
            ],
            [
                'name' => 'RSUD Labuang Baji',
                'rate' => 4.3,
                'reviewer' => 20,
                'phone' => '(0411) 873482',
                'address' => 'Jl. Dr. Ratulangi No.81 Labuang Baji Kec. Mamajang'
            ],
            [
                'name' => 'RS Akademis Jaury',
                'rate' => 4.3,
                'reviewer' => 20,
                'phone' => '(0411) 317343',
                'address' => 'Jl. Jend. M. Jusuf No.57A Pattunuang Kec. Wajo'
            ],
            [
                'name' => 'RS Bhayangkara Makassar',
                'rate' => 4.3,
                'reviewer' => 20,
                'phone' => '(0411) 317343',
                'address' => 'Jl. Andi Mappaodang No.63 Jongaya Kec. Tamalate'
            ],
        ];

        $hospital_service = [
            [
                'service_id' => 1,
                'hospital_id' => 1,
                'rating' =>  2
            ],
            [
                'service_id' => 2,
                'hospital_id' => 1,
                'rating' =>  4
            ],
            [
                'service_id' => 3,
                'hospital_id' => 1,
                'rating' =>  3
            ],
            [
                'service_id' => 4,
                'hospital_id' => 1,
                'rating' =>  5
            ],
        ];

        $gender = [
            ['name' => 'laki laki'],
            ['name' => 'perempuan'],
        ];

        Gender::insert($gender);
        ServiceCategory::insert($service_category);
        Service::insert($service);
        Hospital::insert($hospitals);
        HospitalService::insert($hospital_service);
    }
}
