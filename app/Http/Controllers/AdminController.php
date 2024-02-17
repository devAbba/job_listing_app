<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index(User $user): View
    {
        Gate::authorize('admin');

        return view('admin.dashboard');
    }

    public function users(Request $request)
    {
        Gate::authorize('admin');

        $page_size = $request->query('page_size') ?? 10;
        return view('admin.users', ['users' => User::query()->paginate($page_size)]);
    }

    public function listings(Request $request)
    {
        Gate::authorize('admin');

        $page_size = $request->query('page_size') ?? 10;
        return view('admin.listings', ['listings' => Listing::latest()->filter(request(['tag']))->paginate($page_size)]);
    }
}
