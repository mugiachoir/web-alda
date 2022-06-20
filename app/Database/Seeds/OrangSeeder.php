<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama' => 'Wina Ariyani',
        //         'alamat'    => 'Cicadas RT 09.02 Sagalaherang Subang',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Tya Sulistiani',
        //         'alamat'    => 'Cicadas RT 09.02 Sagalaherang Subang',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Sri Wahyuni',
        //         'alamat'    => 'Cicadas RT 09.02 Sagalaherang Subang',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Firda Widyasari',
        //         'alamat'    => 'Cicadas RT 09.02 Sagalaherang Subang',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],

        // ];
        $faker = \Faker\Factory::create();
        $data = [
            'nama' => $faker->name(),
            'alamat'    => $faker->address(),
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];
        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO orang (nama, alamat,created_at,updated_at) VALUES(:nama:, :alamat:,:created_at:,:updated_at:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('orang')->insert($data);
        // $this->db->table('orang')->insertBatch($data);
    }
}
