<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    public function createTask()
    {
        return view('frontend.pages.createTask')->with(['success' => 'Task Create successfully']);
    }

    public function storeTask(Request $r)
    {
        try {
            $validated = $r->validate([
                'name' => 'required|string',
                'description' => 'required|string'
            ]);

            Task::create([
                'name' => $r->name,
                'description' => $r->description,
                'user_id' => auth()->user()->id
            ]);

            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteTask($id)
    {
        try {
            Task::find($id)->delete();
            return redirect()->route('home')->with(['success' => 'Task deleted successfully']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editTask(Task $task)
    {
        if ($task->status === 'completed') {
            return redirect()->back()->with(['error' => 'Can not edit this task']);
        }
        return view('frontend.pages.editTask')->with(['task' => $task]);
    }

    public function updateTask(Request $r)
    {
        try {
            $r->validate([
                'name' => 'required|string',
                'description' => 'required|string',
            ]);

            if (isset($r->due_date)) {
                $r->validate([
                    'due_date' => [
                        'date_format:Y-m-d',
                        'after:yesterday'
                    ]
                ]);
            }

            Task::where('id', $r->id)
                ->update([
                    'name' => $r->name,
                    'description' => $r->description,
                    'status' => $r->status,
                    'is_prioritized' => $r->is_prioritized,
                    'due_date' => $r->due_date ? $r->due_date : null
                ]);

            return redirect()->route('home')->with(['success' => 'Task updated successfully']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function setReminder(Task $task)
    {
        return view('frontend.pages.set-reminder')->with(['task' => $task]);
    }

    public function viewTask(Task $task)
    {
        return view('frontend.pages.singleTask')->with(['task' => $task]);
    }
}
