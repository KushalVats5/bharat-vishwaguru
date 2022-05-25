<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Http\Helpers\Helper;
use Illuminate\Support\Carbon;
use App\User;

class userExpireTrail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:userExpireTrail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check user expire trail';

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
     * @return int
     */
    public function handle()
    {
        // $users = User::all();
        $users = User::where('payment_status', 'Trail')->with("roles")->whereHas("roles", function($q) {
                    $q->whereIn("name", ["freelancer"]);
                })->get();
       foreach ($users as $user)
       {
            /* Mail::raw("This is automatically generated Hourly Update", function($message) use ($a)
            {
                $message->from('saquib.gt@gmail.com');
                // $message->to($user->email)->subject('Hourly Update');
                $message->to('taxring@getnada.com')->subject('Taxring || Trail Expired');
            });
            dd($user->email); */
            $createdAt = Carbon::parse($user->created_at);
            $createdAt = $createdAt->format('Y-m-d');
            $now = Carbon::parse(now())->format('Y-m-d');
            $days = Helper::dateDiffInDays($createdAt, $now);
            if($days > 45 && $days < 60 ){
                Mail::send('mail.user-expired-reminder', ['data' => $user], function ($message) use ($user) {
                    $message->sender('support@taxring.com', 'Taxring');
                    $message->subject('Taxring || Account Reminder');
                    $message->to($user->email);
                    // $message->to('kvats69@gmail.com');
                    // $message->to('taxring@getnada.com');
                });
                Mail::send('mail.user-expired-reminder', ['data' => $user], function ($message) use ($user) {
                    $message->sender('support@taxring.com', 'Taxring');
                    $message->subject('Taxring || Account Reminder');
                    $message->to('support@taxring.com');
                    // $message->to('taxring@getnada.com');
                });
            }else if($days > 60 ){
                $user->is_active = 0;
                $user->save();
                Mail::send('mail.user-expired', ['data' => $user], function ($message) use ($user) {
                    $message->sender('support@taxring.com', 'Taxring');
                    $message->subject('Taxring || Account Reminder');
                    $message->to($user->email);
                    // $message->to('kvats69@gmail.com');
                    // $message->to('taxring@getnada.com');
                });
                Mail::send('mail.user-expired', ['data' => $user], function ($message) use ($user) {
                    $message->sender('support@taxring.com', 'Taxring');
                    $message->subject('Taxring || Account Reminder');
                    $message->to('support@taxring.com');
                    // $message->to('taxring@getnada.com');
                });
            }else{
                $user->is_active = 1;
                $user->save();
            }
            /* dd($user->email); */
        }
        $this->info('User Expired Update has been send successfully');
    }
}
