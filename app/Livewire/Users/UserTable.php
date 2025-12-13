<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\TableData\Filters\Filter;
use App\Services\TableData\Sorting\SortBy;
use App\Services\TableData\Pagination\Paginate;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

class UserTable extends Component
{
    use WithPagination;

    #[Url(except: '')]
    public $search = '';

    #[Url(except: '')]
    public $sortBy = 'id';

    #[Url(except: '')]
    public $sortDirection = 'asc';

    public function render()
    {
        return view('livewire.users.user-table');
    }

    #[Computed]
    public function users()
    {
        $allowedColumns = ['id', 'name', 'email','created_at'];

        if (! in_array($this->sortBy, $allowedColumns)) {
            abort(400, 'Nieprawidłowa kolumna sortowania.');
        }

        return User::query()
            ->tap(new Filter('name', $this->search, true))
            ->tap(new Filter('email', $this->search, true))
            ->tap(new SortBy($this->sortBy, $this->sortDirection))
            ->paginate(12);
    }

    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }

    }

    public function updateRole($userId, $role)
    {
        $user = User::findOrFail($userId);

        $this->authorize('updateRole', $user);

        $user->syncRoles([$role]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

}

