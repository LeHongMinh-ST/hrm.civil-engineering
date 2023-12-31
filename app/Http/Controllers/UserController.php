<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\User\UserRole;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * @class UserController
 *
 * @package App\Http\Controller
 *
 * @author Lê Hồng Minh <minhhl298.st@gmail.com>
 */
class UserController extends Controller
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

        $users = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(config('constants.limit_paginate'));

        return view('pages.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|View|Factory
     *
     */
    public function create(): Application|View|Factory
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->only(['name', 'username', 'email']);

        try {

            $user = new User();

            $user->fill([...$data, 'password' => '123456aA@']);

            $user->save();

            $request->session()->flash('success', 'Tạo mới tài khoản thành công');

            return redirect()->route('users.index');

        } catch (Exception $exception) {
            Log::error('Error store user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể tạo mới tài khoản']])
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
        $user = User::findOrFail($id);

        return view('pages.user.update')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreUserRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->only(['name', 'username', 'email']);

        $user = User::findOrFail($id);

        try {
            $user->fill($data);

            $user->save();

            $request->session()->flash('success', 'Cập nhật tài khoản thành công');

            return redirect()->route('users.index', request()->query());
        } catch (Exception $exception) {

            Log::error('Error update user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật tài khoản']])
                ->withInput(request()->query());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        try {
            if ($user->role === UserRole::Admin) {
                throw new Exception('User is admin');
            }

            if ($user->id === auth()->id()) {
                throw new Exception('User is authenticated');
            }

            User::destroy($id);

            session()->flash('success', 'Xóa tài khoản thành công');

            return redirect()->route('users.index', $request->query());

        } catch (Exception $exception) {
            Log::error('Error delete user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể xóa tài khoản']])
                ->withInput($request->query());
        }
    }
}
