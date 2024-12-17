<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin::create([
        //     'name' => 'admin',
        //     'email' => 'admin@email.com',
        //     'password' => Hash::make('admin')
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@filsports.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

    }
}
