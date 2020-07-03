<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use App\Traits\SendEmailsTrait;
use Illuminate\Console\Command;

class SessionReminder extends Command
{
    use SendEmailsTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:session';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send an email to all users who have downloaded all the material but have not reserved';

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
        $daysInThePast = Carbon::now()->subDays(30);

        $users = User::whereHas('download',function($query) use ($daysInThePast){
            return $query->where('element_1',true)
            ->where('element_2',true)
            ->where('element_3',true)
            ->where('element_4',true)
            ->where('updated_at','<=',$daysInThePast);
        })->doesntHave('quote')->get();

        foreach($users as $user){
            $this->withoutSessions($user->email);
        }

    }
}
