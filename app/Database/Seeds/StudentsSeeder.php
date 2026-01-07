<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class StudentsSeeder extends Seeder
{
    public function run()
    {
        $faker = getFaker();
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'name' => $faker->firstName,
                'sn' => $faker->ean8,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'adress' => $faker->address,
                'created_at' => TIME::createFromTimestamp($faker->unixTime()),
                'updated_at' => TIME::now()
            ];

            $this->db->table('students')->insert($data);
        }
    }
}
