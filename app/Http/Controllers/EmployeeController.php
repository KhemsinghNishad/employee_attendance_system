<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    
}
