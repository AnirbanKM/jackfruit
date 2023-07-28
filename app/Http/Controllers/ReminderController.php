<?php

namespace App\Http\Controllers;

use App\Events\RemainderEvent;
use App\Models\Reminder;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReminderController extends Controller
{
    public function createReminder(Request $r)
    {
        try {
            $validated = $r->validate([
                'id' => 'required',
                'due_date' => [
                    'required',
                    'date_format:Y-m-d',
                    'after:yesterday'
                ]
            ]);

            $id = $r->id;
            $dueDate = $r->due_date;

            DB::transaction(function () use ($id, $dueDate) {

                $date = Carbon::parse($dueDate)->format('Y-m-d');

                $task = Task::find($id);

                Task::where('id', $id)
                    ->update([
                        'due_date' => $date,
                    ]);

                Reminder::create([
                    'task_id' => $id,
                    'user_id' => auth()->user()->id,
                    'task_name' => $task->name,
                    'email' => auth()->user()->email,
                    'due_date' => $date
                ]);
            }, 2);
            return redirect()->route('home')->with(['success' => 'Task Due Date Set successfully']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function sendMail()
    {
        // CRON JOB CODE
        $reminders = Reminder::where('is_sent', 0)->get();

        event(new RemainderEvent($reminders));
    }
}
