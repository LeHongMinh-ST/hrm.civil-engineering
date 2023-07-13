<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\Salary;
use App\Models\Worker;
use App\Services\WorkerService;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Command\Command as CommandAlias;

class CreateAttendanceMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-attendance-month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $workers = Worker::query()->get();

        try {

            foreach ($workers as $worker) {
                app(WorkerService::class)->createSalaryByWorker($worker);
            }

            return CommandAlias::SUCCESS;

        } catch (Exception $exception) {
            Log::error('Error command app:create-attendance-month', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return CommandAlias::FAILURE;
        }
    }
}
