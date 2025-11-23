<?php

namespace App\Jobs;

use App\Imports\ProjectIpmort;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
// обязательно такой фасад
use Maatwebsite\Excel\Facades\Excel;

class ImportProjectExcelFileJob implements ShouldQueue
{
    use Queueable;

    private $path;

    /**
     * Create a new job instance.
     */
    public function __construct($path)
    {
        //
        $this->path = $path;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Excel::import(new ProjectIpmort(),$this->path, 'public');
    }
}
