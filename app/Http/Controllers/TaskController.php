<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $today = Carbon::now('Asia/Kolkata')->toDateString();

        $tasks = Task::where('user_id', Auth::id())
            ->whereDate('date', $today)
            ->get();

        return view('task-assign', compact('tasks', 'today'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $start = Carbon::parse($request->start_time, 'Asia/Kolkata');
        $end = Carbon::parse($request->end_time, 'Asia/Kolkata');

        $minutes = $start->diffInMinutes($end);
        Task::create([
            'user_id' => Auth::id(),
            'date' => Carbon::now('Asia/Kolkata')->toDateString(),
            'title' => $request->title,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'time_taken' => $minutes,
        ]);

        return back()->with('success', 'Task added successfully!');
    }

    public function report()
    {
        $reports = Employee::where('user_id', Auth::id())
            ->orderBy('date', 'asc')
            ->get();
        return view('emp-report', compact('reports'));
    }

    public function tasks($date)
    {
        $user = Auth::user();
        $date = $date;
        $tasks = Task::select(['id','title', 'time_taken'])
                    ->where([
                        'user_id' => $user->id,
                        'date'    => $date
                    ])->get();
        $totalWorkingInMinutes = $tasks->sum('time_taken');
        $totalWorkingInHour = $totalWorkingInMinutes/60;

        return view('task-report', compact('tasks', 'totalWorkingInHour'));
    }
}
