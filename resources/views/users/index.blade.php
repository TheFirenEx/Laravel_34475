<x-layouts.app :title="__('Users')">
    <section class="w-full">

        @include('partials.users-heading')

        <div class="container p-2 mx-auto sm:p-4 dark:text-gray-800">

            {{-- wyszukiwanie --}}
            <form method="GET" action="{{ route('users.index') }}" class="mb-4 flex gap-2">
                <input type="hidden" name="sortBy" value="{{ $sortBy }}">
                <input type="hidden" name="sortDirection" value="{{ $sortDirection }}">

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="{{ __('Search by name or email') }}"
                    class="border rounded px-3 py-2 w-full"
                />

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                    {{ __('Search') }}
                </button>
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-full text-xs">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-48">
                    </colgroup>

                    <thead>
                        <tr class="text-left">
                            @php
                                $toggle = fn($col) =>
                                    ($sortBy === $col && $sortDirection === 'asc') ? 'desc' : 'asc';

                                $sortLink = fn($col) =>
                                    route('users.index', [
                                        'search' => $search,
                                        'sortBy' => $col,
                                        'sortDirection' => $toggle($col),
                                    ]);
                            @endphp

                            <th class="p-3"><a href="{{ $sortLink('id') }}">{{ __('users.attributes.id') }}</a></th>
                            <th class="p-3"><a href="{{ $sortLink('name') }}">{{ __('users.attributes.Name') }}</a></th>
                            <th class="p-3"><a href="{{ $sortLink('email') }}">{{ __('users.attributes.Email') }}</a></th>
                            <th class="p-3"><a href="{{ $sortLink('created_at') }}">{{ __('users.attributes.Created') }}</a></th>
                            {{-- DO ZROBIENIA ODZIELNY KOLUMN --}}
                            <th class="p-3">{{ __('users.attributes.Role') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-b">
                                <td class="p-3"><p class="font-medium">{{ $user->id }}</p></td>
                                <td class="p-3"><p>{{ $user->name }}</p></td>
                                <td class="p-3"><p>{{ $user->email }}</p></td>
                                <td class="p-3"><p>{{ $user->created_at->format('Y-m-d') }}</p></td>

                                {{-- Zmiana roli --}}
                                <td class="p-3">
                                    @can('updateRole', $user)
                                        <form method="POST" action="{{ route('users.updateRole', $user) }}" class="flex items-center gap-2">
                                            @csrf
                                            <select name="role" class="border rounded px-2 py-1">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role }}" @if($user->hasRole($role)) selected @endif>
                                                        {{ $role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="px-2 py-1 bg-gray-700 text-white rounded text-sm">
                                                {{ __('Save') }}
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $users->appends([
                    'search' => $search,
                    'sortBy' => $sortBy,
                    'sortDirection' => $sortDirection,
                ])->links() }}
            </div>
        </div>
    </section>
</x-layouts.app>