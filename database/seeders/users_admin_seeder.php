<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users_admin_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'email' => 'iniadmin@gmail.com',
                'password' => Hash::make('admin'),
            ],
            [
                'username' => 'gunadarma',
                'email' => 'gunadarma@gunadarma.ac.id',
                'password' => Hash::make('gunadarma'),
            ]
        ]);
    }
}