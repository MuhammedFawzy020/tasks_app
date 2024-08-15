<?php

namespace App\Jobs;
use App\Models\Statistics ;
use App\Models\Tasks;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateUserTaskCounts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

         $allStatistics = Statistics::get();
         
         foreach($allStatistics as $stat){
            $stat->update(['task_count' , Tasks::where('assigned_to_id' , $stat->user_id)->count()]);
         }

        
    }
}
