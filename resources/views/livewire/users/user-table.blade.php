<section class="w-full">
    <div class="container p-2 mx-auto sm:p-4 dark:text-gray-800">
        @include('partials.users-heading')
        <div class="flex justify-end py-3">
            <x-button label="Dodaj użytkownika" icon="plus" positive x-on:click="$dispatch('open-user-form')"/>
        </div>
        {{-- Wyszukiwanie --}}
        <div class="mb-4 flex gap-2">
            <input
                type="text"
                wire:model.live.debounce.150ms="search"
                placeholder="{{ __('Search by name or email') }}"
                class="border rounded px-3 py-2 w-full"
            />
        </div>

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

                        {{-- Sortowanie --}}
                        <th class="p-3 cursor-pointer" wire:click="sort('id')">{{ __('users.attributes.id') }}</th>
                        <th class="p-3 cursor-pointer" wire:click="sort('name')">{{ __('users.attributes.Name') }}</th>
                        <th class="p-3 cursor-pointer" wire:click="sort('email')">{{ __('users.attributes.Email') }}</th>
                        <th class="p-3 cursor-pointer" wire:click="sort('created_at')">{{ __('users.attributes.Created') }}</th>
                        <th class="p-3">{{ __('users.attributes.Role') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($this->users as $user)
                        <tr class="border-b">
                            <td class="p-3"><p class="font-medium">{{ $user->id }}</p></td>
                            <td class="p-3"><p>{{ $user->name }}</p></td>
                            <td class="p-3"><p>{{ $user->email }}</p></td>
                            <td class="p-3"><p>{{ $user->created_at->format('Y-m-d') }}</p></td>

                            {{-- Zmiana roli --}}
                            <td class="p-3">
                                @can('updateRole', $user)
                                    <select
                                        wire:change="updateRole({{ $user->id }}, $event.target.value)"
                                        class="border rounded px-2 py-1"
                                    >
                                        @foreach(\Spatie\Permission\Models\Role::pluck('name') as $role)
                                            <option value="{{ $role }}" @if($user->hasRole($role)) selected @endif>
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginacja --}}
        <div class="mt-4">
            {{$this->users->links() }}
        </div>
        <livewire:users.create-or-update-user />
    </div>
</section>