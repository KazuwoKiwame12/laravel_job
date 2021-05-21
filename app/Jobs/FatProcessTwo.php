<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FatProcessTwo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $process_data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $process_data)
    {
        $this->process_data = $process_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->process_data.' →  2.アップロードを取得して DB に保存';
        Log:info($data);
        $next_process = new FatProcessThree($data);
        dispatch($next_process);
    }
}
