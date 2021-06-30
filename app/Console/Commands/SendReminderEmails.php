<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Todo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\User;
class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification';

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
        //
        $reminders = DB::table('todos')
        ->select('todos.judul','todos.deadline', 'users.id as user_id')
        ->join('details', 'details.workspace_id', '=', 'todos.workspace_id')
        ->join('users', 'details.user_id', '=', 'users.id')
        ->where('todos.deadline',now()->format('Y-m-d'))
        ->whereIn('todos.status', ['todo','inprogress'])
      
        ->get();
        
        //dd($reminders);
        $data=[];
        foreach($reminders as $reminder){
            $data[$reminder->user_id][]=(array) $reminder;
        }
        //dd(now()->format('Y-m-d'));
        foreach($data as $userId => $reminders){
            // foreach($reminders as $reminder){
            //     dd($reminder['deadline']);
            // }
            $this->sendEmailToUser($userId,$reminders);

            //dd($reminders);
        }
        
    }
    private function sendEmailToUser($userId,$reminders){
        
        $user = User::where('id', $userId)->first();
        $email=$user['email'];
        Mail::send('item.reminder', ['reminders'=>$reminders,'email'=>$email], function ($message) use ($email)
                    {
                        $message->from('dailyplannerku@gmail.com', 'dailyplannerku');
                        $message->to($email);
                    });
    }
}
