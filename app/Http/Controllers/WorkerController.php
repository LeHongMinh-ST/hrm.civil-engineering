<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Worker\StoreWorkerRequest;
use App\Models\Worker;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * @class WorkerController
 *
 * @package App\Http\Controller
 *
 * @author Lê Hồng Minh <minhhl298.st@gmail.com>
 */
class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|View|Factory
     */
    public function index(Request $request): Factory|View|Application
    {
        $search = $request->get('q', '');

        $workers = Worker::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(config('constants.limit_paginate'));

        return view('pages.worker.index')->with('workers', $workers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * * @return Application|View|Factory
     */
    public function create(): Application|View|Factory
    {
        return view('pages.worker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(string $id)
    {
        $worker = Worker::findOrFail($id);
        dd($worker);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWorkerRequest $request
     * @return RedirectResponse
     *
     */
    public function store(StoreWorkerRequest $request): RedirectResponse
    {
        $data = $request->only(Worker::ONLY_DATA);

        try {

            $worker = new Worker();

            $worker->fill($data);

            $worker->save();

            $request->session()->flash('success', 'Tạo mới thợ thành công');

            return redirect()->route('workers.index');

        } catch (Exception $exception) {
            Log::error('Error store worker', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể tạo mới thợ']])
                ->withInput();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View
     */
    public function edit(string $id): Application|Factory|View
    {
        $worker = Worker::findOrFail($id);

        return view('pages.worker.update')->with(['worker' => $worker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreWorkerRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->only(Worker::ONLY_DATA);

        $worker = Worker::findOrFail($id);

        try {

            $worker->fill($data);

            $worker->save();

            $request->session()->flash('success', 'Cập nhật thợ thành công');

            return redirect()->route('workers.index', $request->query());

        } catch (Exception $exception) {
            Log::error('Error update worker', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật thợ']])
                ->withInput($request->query());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        $worker = Worker::findOrFail($id);

        try {
            $worker->delete();

            session()->flash('success', 'Xóa thợ thành công');

            return redirect()->route('workers.index', $request->query());

        } catch (Exception $exception) {
            Log::error('Error delete worker', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể xóa thợ']])
                ->withInput($request->query());
        }
    }
}
