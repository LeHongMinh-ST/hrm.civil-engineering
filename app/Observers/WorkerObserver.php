<?php

namespace App\Observers;

use App\Models\Salary;
use App\Models\Worker;
use App\Services\WorkerService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Command\Command as CommandAlias;

/**
 * @WorkerObserver
 */
class WorkerObserver
{
    /**
     * Handle the Worker "created" event.
     *
     * @param Worker $worker
     * @return void
     */
    public function created(Worker $worker): void
    {
        try {
            app(WorkerService::class)->createSalaryByWorker($worker);
        } catch (Exception $exception) {
            Log::error('Error observer worker created', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

        }
    }

    /**
     * Handle the Worker "updated" event.
     *
     * @param Worker $worker
     * @return void
     */
    public function updated(Worker $worker): void
    {
        $salary = Salary::query()
            ->where('worker_id', $worker->id)
            ->where('datetime', Carbon::now()->firstOfMonth()->timestamp)
            ->first();

        if ($salary) {
            $salary->coefficients_salary = $worker->coefficients_salary;
            $salary->save();
        }
    }

    /**
     * Handle the Worker "deleted" event.
     */
    public function deleted(Worker $worker): void
    {
        //
    }

    /**
     * Handle the Worker "restored" event.
     */
    public function restored(Worker $worker): void
    {
        //
    }

    /**
     * Handle the Worker "force deleted" event.
     */
    public function forceDeleted(Worker $worker): void
    {
        //
    }
}
