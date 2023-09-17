<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class jenisKueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('jenis_kue')->insert([
            [
                'jenis' => 'menu_kue',
            ],
            [
                'jenis' => 'menu_kue_kering',
            ],
            [
                'jenis' => 'menu_nasi',
            ],
            [
                'jenis' => 'bakery',
            ],
            [
                'jenis' => 'kue_tradisional',
            ],
        ]);
    }
}