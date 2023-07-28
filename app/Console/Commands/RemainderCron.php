<?php

namespace App\Console\Commands;

use App\Events\RemainderEvent;
use App\Models\Reminder;
use Illuminate\Console\Command;

class RemainderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remainder:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send daily remainder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reminders = Reminder::where('is_sent', 0)->get();

        event(new RemainderEvent($reminders));
    }
}
