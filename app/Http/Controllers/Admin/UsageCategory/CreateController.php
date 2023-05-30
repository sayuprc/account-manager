<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\UsageCategory;

use App\Http\Controllers\Controller;
use App\Models\UsageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreateController extends Controller
{
    public function create()
    {
        return view('admin.usage-categories.create');
    }

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
            ->with('', '');
    }
}
