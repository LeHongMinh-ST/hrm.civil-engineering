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
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * @class UserController
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|View|Factory
     */
    public function index(): Factory|View|Application
    {
        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * * @return Application|View|Factory
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

            $request->session()->flash('success', 'Tạo mới người dùng thành công');

            return redirect()->route('users.index');

        } catch (Exception $e) {
            Log::error('Error store user', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể tạo mới người dùng']])
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
        try {
            $user = User::find($id);

            if (!$user) {
                throw new ModelNotFoundException('User not found');
            }

            return view('pages.user.update')->with(['user' => $user]);

        } catch (ModelNotFoundException $e) {

            Log::error('Error edit user', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            abort(404);
        }

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

        try {
            $user = User::find($id);

            if (!$user) {
                throw new ModelNotFoundException('User not found');
            }

            $user->fill($data);

            $user->save();

            $request->session()->flash('success', 'Cập nhật người dùng thành công');

            return redirect()->route('users.index');
        } catch (ModelNotFoundException $e) {
            Log::error('Error update user', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            abort(404);

        } catch (Exception $e) {
            Log::error('Error update user', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật người dùng']])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                throw new ModelNotFoundException('User not found');
            }

            if ($user->role === UserRole::Admin) {
                throw new Exception('User is admin');
            }

            if ($user->id === auth()->id()) {
                throw new Exception('User is authenticated');
            }

            User::destroy($id);

            session()->flash('success', 'Xóa người dùng thành công');

            return redirect()->route('users.index');

        } catch (ModelNotFoundException $e) {
            Log::error('Error delete user', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            abort(404);

        } catch (Exception $e) {
            Log::error('Error delete user', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể xóa người dùng']])
                ->withInput();
        }
    }
}
