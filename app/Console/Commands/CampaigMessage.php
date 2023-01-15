<?php

namespace App\Console\Commands;

use App\Models\Campaign;
use App\Models\MessageHistory;
use App\Models\subscribe;
use Illuminate\Console\Command;

class CampaigMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:message';

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
        $camping = Campaign::where('status', 'Active')->whereDate('from_date', date('Y-m-d'))->with('message')->get();
        foreach ($camping as $campin) {
            foreach ($campin->message as $message) {
                // dd($campin);
                $todaysDate =  date('H:i');
                $subminit =  date('H:i', strtotime($message->delay));
                $d0 = strtotime($todaysDate);
                $d1 = strtotime($subminit) - strtotime("00:00:00");
                $sumTime = date('H:i', ($d0 - $d1));
                $messCHek =  $campin->whereTime('from_date', $sumTime)->exists();
                if ($messCHek) {
                    $subscribes = subscribe::where('camp_id', $campin->id)->pluck('user_id');
                    for ($i = 0; $i < count($subscribes); $i++) {
                        MessageHistory::create([
                            'user_id' => $subscribes[$i],
                            'message_id' => $message->id,
                        ]);
                    }
                }
            }
        }
    }
};
