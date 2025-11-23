<?php

namespace App\Jobs;

use AllowDynamicProperties;
use App\Imports\ProjectIpmort;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
// обязательно такой фасад
use Maatwebsite\Excel\Facades\Excel;

#[AllowDynamicProperties]
class ImportProjectExcelFileJob implements ShouldQueue
{
    use Queueable;

    private $path;
    private $task;

    /**
     * Create a new job instance.
     */
    public function __construct($path, $task)
    {
        //
        $this->path = $path;
        $this->task = $task;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->task->update(['status' => Task::STATUS_PROCESS]);
        Excel::import(new ProjectIpmort($this->task),$this->path, 'public');
    }
}
