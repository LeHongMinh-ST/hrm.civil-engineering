<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Worker\WorkerStatus;
use App\Models\Attendance;
use App\Models\Worker;
use App\Trait\ResponseTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

/**
 * @class AttendanceController
 *
 * @package App\Http\Controller
 *
 * @author Lê Hồng Minh <minhhl298.st@gmail.com>
 */
class AttendanceController extends Controller
{

    use ResponseTrait;

    /**
     * Display a board of the attendance
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('pages.attendance.board');
    }

    /**
     * Get attachments monthly
     *
     * @param string $month
     * @return JsonResponse
     */
    public function getAttendancesMonth(string $month): JsonResponse
    {
        $startDayInMonth = Carbon::create("01-$month");
        $endDayInMonth = Carbon::create("01-$month")->lastOfMonth();
        $workers = Worker::query()
            ->where('status', WorkerStatus::InWorking)
            ->with('attendances', function ($query) use ($startDayInMonth, $endDayInMonth) {
                return $query->where('date', '<=', $endDayInMonth->timestamp)
                    ->where('date', '>=', $startDayInMonth->timestamp)
                    ->orderBy('date');
            })->get();

        return $this->responseSuccess($workers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
