<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bahan_baku_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bahan_baku')->insert([
            [
                'nama_bahan' => 'butter',
                'harga' => 190,
                'satuan' => 'gram',
            ], [
                'nama_bahan' => 'margarin',
                'harga' => 50,
                'satuan' => 'gram',
            ], [
                'nama_bahan' => 'gula_halus',
                'harga' => 28,
                'satuan' => 'gram',
            ], [
                'nama_bahan' => 'tepung_terigu',
                'harga' => 14,
                'satuan' => 'gram',
            ], [
                'nama_bahan' => 'susu_bubuk',
                'harga' => 160,
                'satuan' => 'gram',
            ],
            [
                'nama_bahan' => 'butik_telur',
                'harga' => 2500,
                'satuan' => 'telur',
            ],
            [
                'nama_bahan' => 'coklat_bubuk',
                'harga' => 1800,
                'satuan' => 'sdm',
            ],
            [
                'nama_bahan' => 'vanilla',
                'harga' => 500,
                'satuan' => 'sdt',
            ],

        ]);
    }
}
