<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class EditController extends Controller
{
    /**
     * Displays the registration form
     *
     * @param Request $request
     * @param string  $id
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $found = User::find($id);

        if ($found === null) {
            return redirect()
                ->intended('/admin/users')
                ->withErrors([
                    'message' => Lang::get('action.user_not_found'),
                ]);
        }

        return view('admin.users.show', ['user' => $found]);
    }

    /**
     * Executes the user registration process
     *
     * @param Request $request
     * @param string  $id
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, string $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'last_name' => ['required', 'string', 'min:1', 'max:32'],
            'first_name' => ['required', 'string', 'min:1', 'max:32'],
            'email' => ['required', 'email', 'unique:users,email,' . $id . ',user_id', 'max:256'],
            'password' => ['nullable', 'string', 'min:8', 'max:256'],
            'is_admin' => ['bool'],
            'is_active' => ['bool'],
        ]);

        $found = User::find($id);

        if ($found === null) {
            return redirect()
                ->intended('/admin/users/')
                ->withErrors([
                    'message' => Lang::get('action.user_not_found'),
                ]);
        }

        $logged = $request->user()->user_id;

        // ログインユーザーと同じユーザーを修正したとき、ステータスとadmin権限は変更しないようにする
        if ($logged === $id) {
            unset($validated['is_admin']);
            unset($validated['is_active']);
        }

        $found->last_name = $validated['last_name'];
        $found->first_name = $validated['first_name'];
        $found->email = $validated['email'];

        if ($validated['password']) {
            $found->password = Hash::make($validated['password']);
        }

        if (isset($validated['is_admin'])) {
            $found->is_admin = $validated['is_admin'];
        }

        if (isset($validated['is_active'])) {
            $found->is_active = $validated['is_active'];
        }

        $found->save();

        return back()->with('success', Lang::get('action.success_update_user_info'));
    }
}
