<?php

namespace App\Listeners;

use App\Events\RemainderEvent;
use App\Mail\RemainerMail;
use App\Models\Reminder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ReminderListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RemainderEvent $event): void
    {
        $todayDate = Carbon::now()->format('Y-m-d');

        foreach ($event->data as $key => $value) {
            $eachDueDate = $value->due_date;

            if ($eachDueDate === $todayDate) {
                Mail::to($value->email)->send(new RemainerMail([$value->task_name, $eachDueDate]));

                Reminder::where('id', $value->id)->update(['is_sent' => 1]);
            }
        }
    }
}
