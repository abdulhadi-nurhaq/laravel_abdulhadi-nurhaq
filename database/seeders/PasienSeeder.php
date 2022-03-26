<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pasien = [
            [
                'nama' => 'Abdul',
                'alamat' => 'Sanding',
                'telepon' => '085156790646',
                'hospital_id' => '1',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => 'Hadi',
                'alamat' => 'Malangbong',
                'telepon' => '081395127508',
                'hospital_id' => '2',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => 'Nur',
                'alamat' => 'Garut',
                'telepon' => '08972936644',
                'hospital_id' => '3',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ]
        ];
        \DB::table('pasien')->insert($pasien);
    }
}
