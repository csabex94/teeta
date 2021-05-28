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
        $dailyTasks = Task::where('daily',1)->get();
        $specDateTasks = Task::whereDate('spec_date', Carbon::today())->where('completed', 0)->get();
        $daily = array();

        foreach ($dailyTasks as $task)
        {
            if ($task->completed == 1) {
                if ($task->completed_at < Carbon::today()) {
                    array_push($daily, $task);
                }
            } else {
                array_push($daily, $task);
            }
        }

        return Inertia::render('Dashboard', [
            'tasks' => array_merge($daily, $specDateTasks->toArray()),
            'upcomingTasks' => []
        ]);
    }
}
