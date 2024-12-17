<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // User::create([
        //     'name'=>'Admin',
        //     'email'=>'admin@filsports.com',
        //     'password'=>Hash::make('admin'),
        //     'role' => 'admin'
        // ]);

        
        User::create([
            'name'=>'Rider',
            'email'=>'rider@filsports.com',
            'password'=>Hash::make('rider'),
            'role' => 'rider'
        ]);

    }
}
