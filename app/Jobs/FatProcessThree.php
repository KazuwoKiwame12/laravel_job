<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FatProcessThree implements ShouldQueue
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
        Log:info($this->process_data.' →  3.DBの保存結果を変換してファイルに出力');
    }
}
