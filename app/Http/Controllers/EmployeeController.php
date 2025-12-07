<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{


    public function clockIn(Request $request)
    {
        $today = Carbon::now('Asia/Kolkata')->toDateString();
        $alreadyClockedIn = Employee::where('user_id', Auth::id())
            ->whereDate('date', $today)
            ->whereNotNull('clock_in')
            ->exists();

        if ($alreadyClockedIn) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already clocked in today.'
            ]);
        }
        $employeeDetails = new Employee();
        $employeeDetails->user_id = Auth::id();
        $employeeDetails->date = $today;
        $employeeDetails->clock_in = Carbon::now('Asia/Kolkata');
        $employeeDetails->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Check-in completed',
            'time' => $employeeDetails->clock_in
        ]);
    }


    public function clockOut()
    {
        $today = Carbon::now('Asia/Kolkata')->toDateString();

        $employeeDetails = Employee::where('user_id', Auth::id())
            ->whereDate('date', $today)
            ->whereNull('clock_out')
            ->first();

        if (!$employeeDetails) {
            return response()->json([
                'status' => 'error',
                'message' => 'No check-in record found for today'
            ]);
        }



        $employeeDetails->clock_out = Carbon::now('Asia/Kolkata');
        $employeeDetails->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Check-out completed',
            'time' => $employeeDetails->clock_out
        ]);
    }

    public function employeeEntry()
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
