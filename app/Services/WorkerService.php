<?php

namespace App\Services;


use App\Models\Attendance;
use App\Models\Salary;
use App\Models\Worker;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * @class WorkerService
 */
class WorkerService
{
    /**
     * @param Worker $worker
     * @return void
     * @throws Exception
     */
    public function createSalaryByWorker(Worker $worker): void
    {
        DB::beginTransaction();
        try {
            $data = [];
            $month = Carbon::now()->format('m-Y');
            $daysInMonth = Carbon::now()->daysInMonth;

            $salary = Salary::query()
                ->where('worker_id', $worker->id)
                ->where('datetime', Carbon::now()->firstOfMonth()->timestamp)
                ->first();

            if (!$salary) {
                $salary = new Salary();
                $salary->fill([
                    'worker_id' => $worker->id,
                    'coefficients_salary' => $worker->coefficients_salary,
                    'datetime' => Carbon::now()->firstOfMonth()->timestamp
                ]);

                $salary->save();

                for ($i = 0; $i < $daysInMonth; $i++) {
                    $day = $i + 1;
                    $data[] = [
                        'worker_id' => $worker->id,
                        'salary_id' => $salary->id,
                        'date' => Carbon::create("$day-$month")->timestamp,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];

                }
            }

            if (!empty($data)) {
                Attendance::insert($data);
            }
            DB::commit();
        }catch (Exception $exception) {
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
