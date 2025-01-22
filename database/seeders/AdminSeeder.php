<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'TARUN',
            'email' => 'tarunmachhi29@gmail.com',
            'password' => Hash::make('12341234'), // Change this to a secure password
            'usertype' => 'admin',
            'unique_id' => 'ADM-2023-0001', // Adjust the unique_id as needed
        ]);

        User::create([
            'name' => 'Parmar Viral',
            'email' => 'parmarviral397@gmail.com',
            'password' => Hash::make('12341234'), // Change this to a secure password
            'usertype' => 'admin',
            'unique_id' => 'ADM-2023-0002', // Adjust the unique_id as needed
        ]);
    }
}
