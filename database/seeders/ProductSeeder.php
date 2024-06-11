<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Kamar A',
                'hotel_id' => '1',
                'type_id' => '1',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Kamar B',
                'hotel_id' => '2',
                'type_id' => '2',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Kamar A',
                'hotel_id' => '3',
                'type_id' => '3',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Kamar A',
                'hotel_id' => '4',
                'type_id' => '4',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
        ]);
    }
}
