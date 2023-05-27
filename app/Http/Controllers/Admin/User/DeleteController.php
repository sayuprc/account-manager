<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class DeleteController extends Controller
{
    /**
     * Executes the user delete process
     *
     * @param Request $request
     * @param string  $id
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request, string $id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        if ($request->user()->user_id === $id) {
            return redirect()->intended('/admin/users')
                ->withErrors([
                    'message' => Lang::get('action.can_not_logged-in_user'),
                ]);
        }

        User::destroy($id);

        return redirect()
            ->intended('/admin/users')
            ->with('success', Lang::get('action.success_delete_user'));
    }
}
