<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@schoolnex.com'],
            [
                'name' => 'System Administrator',
                'email' => 'admin@schoolnex.com',
                'password' => \Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
    }
}
