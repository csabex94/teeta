<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validData = $request->validate([
           'title' => 'required|string',
           'description' => 'required|string',
           'daily' => 'required|boolean',
           'push_email' => 'required|boolean'
        ]);
        $newTask = new Task();

        if ($validData) {
            $newTask->title = $validData['title'];
            $newTask->description = $validData['description'];
            $newTask->daily = $validData['daily'];
            $newTask->push_email = $validData['push_email'];
            $newTask->user_id = auth()->user()->id;
        }

        if ($request->spec_date) {
            $newTask->spec_date = $request->spec_date;
        }

        if ($request->remind_before_option && $request->remind_before_option != 'Remind me before') {
            $newTask->remind_before_option = $request->remind_before_option;
        }

        if ($request->remind_before_value) {
            $newTask->remind_before_value = $request->remind_before_value;
        }

        $newTask->save();
        return Inertia::render('CreateTask');
    }

    public function deleteTask(Request $request)
    {
        $taskToDelete = Task::where('id', '=', $request->taskId)->first();
        $taskToDelete->delete();

        $dailyTasks = Task::where([['daily', '=', 1], ['user_id', '=', auth()->user()->id]])->get();
        $specDateTasks = Task::whereDay('spec_date', '=', Carbon::now()->format('d'))->where('user_id', '=', auth()->user()->id)->get();


        return redirect()->back()->with([
            'tasks' => array_merge($specDateTasks->toArray(), $dailyTasks->toArray())
        ]);
    }

    public function completeTask(Request $request)
    {
        $taskToComplete = Task::where([['id', '=', $request->taskId], ['user_id', '=', auth()->user()->id]])->first();
        $taskToComplete->update([
            'completed' => 1
        ]);
        $taskToComplete->completed_at = Carbon::now();
        $taskToComplete->save();

        $dailyTasks = Task::where([['daily', '=', 1], ['user_id', '=', auth()->user()->id], ['completed', '=', 0]])->get();
        $specDateTasks = Task::whereDay('spec_date', '=', Carbon::now()->format('d'))->where([['user_id', '=', auth()->user()->id], ['completed', '=', 0]])->get();

        return redirect()->back()->with([
            'tasks' => array_merge($specDateTasks->toArray(), $dailyTasks->toArray())
        ]);
    }
}
