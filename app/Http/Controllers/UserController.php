<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $query = User::query();

        // wyszukiwanie po name i email
        if ($q = $request->query('q')) {
            $query->where(function ($qry) use ($q) {
                $qry->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        // sortowanie
        $allowed = ['id', 'name', 'email', 'created_at'];
        $sort = $request->query('sort', 'id');
        $direction = $request->query('direction', 'desc') === 'asc' ? 'asc' : 'desc';
        if (! in_array($sort, $allowed)) {
            $sort = 'id';
        }
        $query->orderBy($sort, $direction);

        $users = $query->with('roles')->paginate(15)->withQueryString();
        $roles = Role::pluck('name');

        return view('users.index', compact('users', 'roles', 'sort', 'direction'));
    }

    //aktualizacja roli
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user->syncRoles([$request->input('role')]);

        return back()->with('success', __('Rola użytkownika została zaktualizowana.'));
    }
}