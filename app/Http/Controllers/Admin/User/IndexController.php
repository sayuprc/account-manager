<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    /**
     * Display a list of system users
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $users = User::all([
            'user_id',
            'email',
            'last_name',
            'first_name',
            'is_active',
            'is_admin',
            'created_at',
            'updated_at',
        ]);

        return view('admin.users.index', compact('users'));
    }
}
