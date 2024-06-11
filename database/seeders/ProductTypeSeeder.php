<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_types')->insert([
            [
                'name' => 'Standar',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Deluxe',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Superior',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Suite',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Single Room',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Double Room',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
            [
                'name' => 'Family Room',
                'created_at' => date("y-m-d H:i:s", strtotime("now")),
                'updated_at' => date("y-m-d H:i:s", strtotime("now")),
            ],
        ]);
    }
}
