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
        Gate::authorize('is_admin');

        $page_size = $request->query('page_size') ?? 5;
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate($page_size);

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
        Gate::authorize('is_admin');

        $page_size = $request->query('page_size') ?? 5;
        $users = User::filter(request(['search']))->paginate($page_size);

        return view('admin.users', ['users' => $users]);
    }

    public function toggleRole(Request $request, $user_id)
    {

        Gate::authorize('is_mod');

        $user = User::findOrFail($user_id);

        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        return response()->json(['message' => 'user role toggled successfully'], 200);

    }

}
