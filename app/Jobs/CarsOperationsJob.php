<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Resources\CarsOperations as ResourcesCarsOperations;
use App\Http\Requests\CarsOperationsStoreRequest;
use App\Models\Cars_operations;


class CarsOperationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct(private array $request)
    {
        
    }

    /**
     * Execute the job.
     *
    * @return void
     */
    public function handle()
    {
        Cars_operations::create($this->request);
    }
}
