<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        Gate::authorize('admin');

        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(6);

        return view('admin.dashboard',
            [
                'listings' => $listings,
                'total_count' => Listing::count(),
                'total_users' => User::count()
            ]
        );
    }

    public function users(Request $request): View
    {
        Gate::authorize('admin');

        $page_size = $request->query('page_size') ?? 6;
        $users = User::latest()->filter(request(['search']))->paginate($page_size);

        return view('admin.users', ['users' => $users]);
    }

}
