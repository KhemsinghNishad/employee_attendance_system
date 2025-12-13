<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $now = Carbon::now();

        $users = [
            [
                'name' => 'daman',
                'email' => 'daman@example.com',
                'mobile' => '9876543210',
                'password' => 'Daman@123',
                'address' => 'Bhilai',
            ],
            [
                'name' => 'kamal',
                'email' => 'kamal@example.com',
                'mobile' => '7894561230',
                'password' => 'Kamal@123',
                'address' => 'Durg',
            ],
            [
                'name' => 'apoorva',
                'email' => 'apoorva@example.com',
                'mobile' => '9123456780',
                'password' => 'Apoorva@123',
                'address' => 'Raipur',
            ],
            [
                'name' => 'sakshi',
                'email' => 'sakshi@example.com',
                'mobile' => '9988776655',
                'password' => 'Sakshi@123',
                'address' => 'Rajnandgaon',
            ],
            [
                'name' => 'hardik',
                'email' => 'hardik@example.com',
                'mobile' => '9090909090',
                'password' => 'Hardik@123',
                'address' => 'Bhilai',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // unique key
                [
                    'name'       => $user['name'],
                    'mobile'     => $user['mobile'],
                    'address'    => $user['address'],
                    'password'   => Hash::make($user['password']),
                    'role'       => 'employee',
                    'updated_at' => $now,
                    'created_at' => $now,
                ]
            );
        }
    }
}
