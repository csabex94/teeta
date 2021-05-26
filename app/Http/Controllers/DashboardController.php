<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $dailyTasks = Task::where([
            ['daily', '=', 1],
            ['user_id', '=', auth()->user()->id],
            ['completed', '=', 0]
        ])->get();
        $specDateTasks = Task::where('spec_date', '=', Carbon::today())->where([
            ['user_id', '=', auth()->user()->id],
            ['completed', '=', 0],
            ['daily', '=', 0]
        ])->get();


        return Inertia::render('Dashboard',[
            'tasks' => array_merge($specDateTasks->toArray(), $dailyTasks->toArray())
        ]);
    }
}
