<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'nama' => 'Admin',
                'username' => 'admin01',
                'password' => bcrypt('admin123'),
                'created_at' => new \DateTime,
                'updated_at' => null,
            ]
        ];
        \DB::table('admin')->insert($admin);
    }
}
