<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bahan_kemasan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bahan_kemasan')->insert([
            [
                'nama_bahan' => 'paper_doilies',
                'harga' => 4000,
            ],
            [
                'nama_bahan' => 'kardus',
                'harga' => 5500,
            ],
            [
                'nama_bahan' => 'label',
                'harga' => 1000,
            ],
        ]);
    }
}
