<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Mail\ReservationReminder;
use Illuminate\Support\Facades\Mail;

class SendReservationReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '予約当日の朝にリマインダーを送信';

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
        $today = Carbon::today()->toDateString();
        $reservations = Reservation::where('reservation_date', $today)->get();

        foreach($reservations as $reservation) {
            Mail::to($reservation->user->email)->send(new ReservationReminder($reservation));
        }
        $this->info('予約リマインダーを送信しました！');
    }
}
