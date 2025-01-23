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
            'first_name' => 'TARUN',
            'middle_name' => '',
            'last_name' => 'MACHHI',
            'date_of_birth' => '1990-01-01', // Adjust the date of birth as needed
            'phone_number' => '1234567890', // Adjust the phone number as needed
            'email' => 'tarunmachhi29@gmail.com',
            'password' => Hash::make('12341234'), // Change this to a secure password
            'usertype' => 'admin',
            'unique_id' => 'ADM-2023-0001', // Adjust the unique_id as needed
        ]);

        User::create([
            'first_name' => 'Parmar',
            'middle_name' => '',
            'last_name' => 'Viral',
            'date_of_birth' => '1990-01-01', // Adjust the date of birth as needed
            'phone_number' => '0987654321', // Adjust the phone number as needed
            'email' => 'parmarviral397@gmail.com',
            'password' => Hash::make('12341234'), // Change this to a secure password
            'usertype' => 'admin',
            'unique_id' => 'ADM-2023-0002', // Adjust the unique_id as needed
        ]);
    }
}
