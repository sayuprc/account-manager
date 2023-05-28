<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Executes the logout process
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->intended('/login');
    }
}
