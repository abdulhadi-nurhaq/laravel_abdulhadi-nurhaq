<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospital = [
            [
                'nama' => 'Rumah Sakit Malangbong',
                'alamat' => 'Jl. Raya Malangbong - Ciawi, Sukamanah, Kec. Malangbong, Kabupaten Garut, Jawa Barat 44188',
                'email' => 'rsumalangbong@gmail.com',
                'telepon' => '-',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => 'Rumah Sakit Garut',
                'alamat' => 'Jl. Rsu DR. Slamet No.12, Sukakarya, Kec. Tarogong Kidul, Kabupaten Garut, Jawa Barat 44151',
                'email' => 'rsugarut@gmail.com',
                'telepon' => '(0262) 232720',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => 'Rumah Sakit Bandung',
                'alamat' => 'Jl. Rumah Sakit No.22, Pakemitan, Kec. Cinambo, Kota Bandung, Jawa Barat 45474',
                'email' => 'rsubandung@gmail.com',
                'telepon' => '(022) 7811794',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ]
        ];
        \DB::table('hospital')->insert($hospital);
    }
}
