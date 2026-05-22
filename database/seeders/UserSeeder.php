<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@sipema.com'],
            [
                'name' => 'Administrator SIPEMA',
                'nim' => '000000000',
                'program_studi' => 'Admin Pusat',
                'no_telepon' => '081234567890',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Seed Student User 1
        User::updateOrCreate(
            ['email' => 'berlian@sipema.com'],
            [
                'name' => 'Berlian Galuh Okta Safitri',
                'nim' => '24010255',
                'program_studi' => 'Teknik Informatika',
                'no_telepon' => '089876543210',
                'role' => 'mahasiswa',
                'password' => Hash::make('password'),
            ]
        );

        // 3. Seed Student User 2
        User::updateOrCreate(
            ['email' => 'ishika@sipema.com'],
            [
                'name' => 'Ishika Larasati',
                'nim' => '240102088',
                'program_studi' => 'Teknik Komputer',
                'no_telepon' => '089876543211',
                'role' => 'mahasiswa',
                'password' => Hash::make('password'),
            ]
        );
    }
}
