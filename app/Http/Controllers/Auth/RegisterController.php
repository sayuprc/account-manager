<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Displays the registration form
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showRegistrationForm(): \Illuminate\Contracts\View\View
    {
        return view('auth.register');
    }

    /**
     * Executes the user registration process
     *
     * @param Request $request
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'last_name' => ['required', 'min:1', 'max:32'],
            'first_name' => ['required', 'min:1', 'max:32'],
            'email' => ['required', 'email', 'unique:users', 'max:256'],
            'password' => ['required', 'string', 'min:8', 'max:256'],
        ]);

        $user = new User([
            'user_id' => (string)Str::uuid(),
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_active' => true,
            'is_admin' => false,
        ]);

        $user->save();

        return redirect('/login')->with('success', Lang::get('auth.registration_completed'));
    }
}
