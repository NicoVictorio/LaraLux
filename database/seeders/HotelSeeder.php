<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'name' => 'Hotel Nico',
                'address' => 'Jalan Nico Hahaha',
                'phone_number' => '08123456789',
                'email' => 'nico@gmail.com',
                'type_id' => '1',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Hotel Seli',
                'address' => 'Jalan Seli Hihihi',
                'phone_number' => '08123456789',
                'email' => 'seli@gmail.com',
                'type_id' => '1',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Hotel Ket',
                'address' => 'Jalan Ket Hehehe',
                'phone_number' => '08123456789',
                'email' => 'ket@gmail.com',
                'type_id' => '2',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Hotel Erin',
                'address' => 'Jalan Erin Hohoho',
                'phone_number' => '08123456789',
                'email' => 'erin@gmail.com',
                'type_id' => '3',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
        ]);
    }
}
