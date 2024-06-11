<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_types')->insert([
            [
                'name' => 'City Hotel',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Residential Hotel',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Motel',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
        ]);
    }
}
