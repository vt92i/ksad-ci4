<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CustomerSeeder extends Seeder {
    public function run() {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 1; $i <= 100; $i++) {
            $data = [
                'name' => $faker->name(),
                'no_customer' => $faker->nik(),
                'gender' => $faker->randomElement(['L', 'P']),
                'address' => $faker->address(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::createFromTimestamp($faker->unixTime()),
            ];
            $this->db->table('customers')->insert($data);
        }
    }
}