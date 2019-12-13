<?php

namespace App\Console\Commands;

use App\Mail\TaskPending as MailTaskPending;
use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TaskPending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task.pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to the Users Daily when Pending';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tasks = Task::whereRaw("FORMAT(deadline, 'yyyy-MM-dd')  <= ".date('Y-m-d')." and status = 1")->get();
        foreach($tasks as $task){
            Mail::to('ashwinlaly@gmail.com')->send(new MailTaskPending($task));
        }
    }
}
