<?php

namespace App\Console;

use App\Models\Crew;
use App\Events\CrewExpiredEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        Log::info('Scheduler is running');

        try {
            $expiredKontrak = Crew::where('warn_kontrak', '<=', now())
                                    ->where('is_notif_kontrak', false)
                                    ->get();
            $expiredMCU = Crew::where('warn_mcu', '<=', now())
                                    ->where('is_notif_mcu', false)
                                    ->get();
            if($expiredKontrak){
                foreach ($expiredKontrak as $crew) {
                    Log::info('Kontrak akan expired untuk : ' . $crew->nama_crew);
                    event(new CrewExpiredEvent($crew, 'kontrak'));
                }
            } elseif ($expiredMCU) {
                foreach ($expiredMCU as $crew) {
                    Log::info('MCU akan expired untuk: ' . $crew->nama_crew);
                    event(new CrewExpiredEvent($crew, 'mcu'));
                }
            }
        } catch (\Exception $e) {
            Log::error('Error in scheduler callback: ' . $e->getMessage());
        }
    })->everyMinute();
}

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
