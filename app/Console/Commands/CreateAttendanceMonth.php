<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\Salary;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Console\Command;
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


        $daysInMonth = Carbon::now()->daysInMonth;



        $data = [];

        foreach ($workers as $worker) {
            $date = Carbon::now();

            $salary = Salary::query()
                ->where('worker_id', $worker->id)
                ->where('datetime', Carbon::now()->timestamp)->first();

            if (!$salary) {
                $salary = new Salary();
                $salary->fill([
                    'worker_id',
                    'coefficients_salary' => $worker->coefficients_salary,
                    'datetime' => Carbon::now()->timestamp
                ]);

                $salary->save();

                for ($i = 0; $i < $daysInMonth; $i++) {
                    $dataDate = $date;

                    $data[] = [
                        'date' => $dataDate->timestamp,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];

                    $date->add(1);
                }
            }

        }

        if (!empty($data)) {
            Worker::insert($data);
        }

        return CommandAlias::SUCCESS;
    }
}
