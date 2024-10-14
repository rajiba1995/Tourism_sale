<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'name' => 'Admin One',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('secret'), // Password will be hashed
            ],
            [
                'name' => 'Admin Two',
                'email' => 'admin@admin.com',
                'password' => Hash::make('secret'),
            ],
        ]);
    }
}
