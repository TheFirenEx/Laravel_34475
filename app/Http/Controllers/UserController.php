<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use App\Services\TableData\Filters\Filter;
use App\Services\TableData\Sorting\SortBy;
use App\Services\TableData\Pagination\Paginate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;
    
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
            
        $request->validate([
            'sortBy'=> ['nullable', Rule::in([null, 'id', 'name', 'email', 'created_at'])],
            'sortDirection' => ['nullable', Rule::in([null, 'asc', 'desc'])],
            'search' => ['nullable', 'string'],
        ]);

        return view('users.index', [
            'users' => User::query()
                ->tap(new Filter('name', $request->search, true))
                ->tap(new Filter('email', $request->search, true))
                ->tap(new SortBy($request->sortBy, $request->sortDirection))
                ->pipe(new Paginate),
            'sortBy' => $request->input('sortBy', null),
            'sortDirection' => $request->input('sortDirection', null),
            'search' => $request->input('search', null),
            'roles' => Role::pluck('name'),
        ]);
    }

    //aktualizacja roli
    public function updateRole(Request $request, User $user)
    {
         $this->authorize('updateRole', $user);

        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user->syncRoles([$request->input('role')]);

        return back()->with('success', __('Rola użytkownika została zaktualizowana.'));
    }
}