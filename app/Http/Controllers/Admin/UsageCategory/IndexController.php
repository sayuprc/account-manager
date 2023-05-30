<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\UsageCategory;

use App\Http\Controllers\Controller;
use App\Models\UsageCategory;

class IndexController extends Controller
{
    /**
     * Display a list of usage categories
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $usageCategories = UsageCategory::all();

        return view('admin.usage-categories.index', compact('usageCategories'));
    }
}
