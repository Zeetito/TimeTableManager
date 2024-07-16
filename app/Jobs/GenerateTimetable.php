<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Services\SchedulerService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class GenerateTimetable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // public $queue = 'timetable_generation';

    protected $semester;

    /**
     * Create a new job instance.
     */
    public function __construct($semester)
    {
        $this->semester = $semester;
        $semester = $this->semester;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        SchedulerService::scheduleTimetable_forSem($this->semester);
    }
}
