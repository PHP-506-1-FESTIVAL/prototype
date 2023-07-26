<?php

namespace App\Console\Commands;

use App\Mail\JjimMail;
use App\Mail\RegisMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FavoriteSendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jjim:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $a='';
        // Mail::to('test123@aa.aa')->send(new RegisMail($a));
        $timer=Carbon::now()->addWeek(1)->format('Y-m-d');
        $temp_fesId = DB::table('favorites')
                ->join('festivals', 'favorites.festival_id', '=', 'festivals.festival_id' )
                ->select('*')->where('festival_start_date',$timer)->get();
        // dump($temp_fesId);
        // dump($timer);
        $i=0;
        foreach ($temp_fesId as $value) {
            $user[$i]=User::find($value->user_id);
            $i++;
        }
        // dump($user);
        foreach ($user as $key=>$value) {
            Mail::to($value->user_email)->send(new JjimMail($user[$key],$temp_fesId[$key]));
        }
    }
}
