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
        $timer=Carbon::now()->addWeek(1)->format('Y-m-d');
        $jjim_id = DB::table('favorites')
        ->join('festivals', 'favorites.festival_id', '=', 'festivals.festival_id' )
        ->join('users','favorites.user_id','=','users.user_id',)
        ->where('user_marketing_agreement','1')->where('festival_start_date',$timer)
        ->select('*')->get();

        foreach ($jjim_id as $value) {
            Mail::to($value->user_email)->send(new JjimMail($value));
        }
    }
}
