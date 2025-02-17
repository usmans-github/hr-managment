<?php

namespace App\Console\Commands;

use App\Models\Attendence;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckAbsentEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-absent-employees';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check employees who did not check in before the required time and mark them absent';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoffTime = Carbon::today()->setHour(7)->setMinute(0)->setSecond(0);

        $attendences = Attendence::where('checked_in');
    }
}
