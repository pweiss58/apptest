<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetExpiredTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ResetExpiredTickets:resettickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset expired Tickets';

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
        $currTime = new \DateTime(null, new \DateTimeZone('Europe/Berlin'));
        //$currTime = date("Y-m-d H:i:s");

        $currTimeMinusCountdown = $currTime->sub(new \DateInterval('PT1M'));

        DB::table('tickets')->where('reservationDate', '<', $currTimeMinusCountdown)->update([
            'reservationDate' => null,
            'user_id' => null,
            'available' => true,
        ]);
    }
}
