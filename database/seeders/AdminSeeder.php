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

        User::create([
            'first_name' => 'John',
            'middle_name' => '',
            'last_name' => 'Doe',
            'date_of_birth' => '1990-01-01',
            'phone_number' => '1111111111',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password'), // Change this to a secure password
            'usertype' => 'user',
            'unique_id' => 'USR-2023-0001',
        ]);

        User::create([
            'first_name' => 'Jane',
            'middle_name' => '',
            'last_name' => 'Smith',
            'date_of_birth' => '1990-01-01',
            'phone_number' => '2222222222',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password'), // Change this to a secure password
            'usertype' => 'nurse',
            'unique_id' => 'NUR-2023-0001',
        ]);

        User::create([
            'first_name' => 'Emily',
            'middle_name' => '',
            'last_name' => 'Johnson',
            'date_of_birth' => '1990-01-01',
            'phone_number' => '3333333333',
            'email' => 'emilyjohnson@example.com',
            'password' => Hash::make('password'), // Change this to a secure password
            'usertype' => 'doctor',
            'unique_id' => 'DOC-2023-0001',
        ]);

        User::create([
            'first_name' => 'Michael',
            'middle_name' => '',
            'last_name' => 'Brown',
            'date_of_birth' => '1990-01-01',
            'phone_number' => '4444444444',
            'email' => 'michaelbrown@example.com',
            'password' => Hash::make('password'), // Change this to a secure password
            'usertype' => 'patient',
            'unique_id' => 'PAT-2023-0001',
        ]);
    }
}
