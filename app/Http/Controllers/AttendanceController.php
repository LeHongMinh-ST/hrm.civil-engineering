<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * @class AttendanceController
 *
 * @package App\Http\Controller
 *
 * @author Lê Hồng Minh <minhhl298.st@gmail.com>
 */
class AttendanceController extends Controller
{
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
