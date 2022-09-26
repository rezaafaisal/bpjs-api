<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
    }
}
