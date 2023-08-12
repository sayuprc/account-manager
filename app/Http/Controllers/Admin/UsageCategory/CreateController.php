<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\UsageCategory;

use App\Http\Controllers\Controller;
use App\Models\UsageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class CreateController extends Controller
{
    /**
     * Displays the usage category registration form
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.usage-categories.create');
    }

    /**
     * Executes the usage category registration process
     *
     * @param Request $request
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'usage_category_name' => ['required', 'min:1', 'max:256'],
        ]);

        $newUsageCategory = new UsageCategory([
            'usage_category_id' => (string)Str::uuid(),
            'usage_category_name' => $validated['usage_category_name'],
        ]);

        $newUsageCategory->save();

        return redirect()
            ->intended('/admin/usage-categories')
            ->with('success', Lang::get('action.usage-category.success-registration'));
    }
}
