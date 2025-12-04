<?php

namespace Database\Seeders;

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

    DB::table('users')->insert([
        [
            'name' => 'daman',
            'email' => 'daman@example.com',
            'mobile' => '9876543210',
            'password' => Hash::make('Daman@123'),
            'address' => 'Bhilai',
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            'name' => 'kamal',
            'email' => 'kamal@example.com',
            'mobile' => '7894561230',
            'password' => Hash::make('Kamal@123'),
            'address' => 'Durg',
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            'name' => 'apoorva',
            'email' => 'apoorva@example.com',
            'mobile' => '9123456780',
            'password' => Hash::make('Apoorva@123'),
            'address' => 'Raipur',
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            'name' => 'sakshi',
            'email' => 'sakshi@example.com',
            'mobile' => '9988776655',
            'password' => Hash::make('Sakshi@123'),
            'address' => 'Rajnandgaon',
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            'name' => 'hardik',
            'email' => 'hardik@example.com',
            'mobile' => '9090909090',
            'password' => Hash::make('Hardik@123'),
            'address' => 'Bhilai',
            'created_at' => $now,
            'updated_at' => $now,
        ],
    ]);
}

}
