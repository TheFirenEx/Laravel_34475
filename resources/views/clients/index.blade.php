<x-layouts.app :title="__('Clients')">
    <section class="w-full">

        @include('partials.clients-heading')

        <div class="container p-2 mx-auto sm:p-4 dark:text-gray-800">

            <div class="overflow-x-auto">
                <table class="min-w-full text-xs">
                    <colgroup>
                        <col> <!-- ID -->
                        <col> <!-- Imię -->
                        <col> <!-- Nazwisko -->
                        <col> <!-- Firma -->
                        <col> <!-- PESEL/NIP -->
                        <col> <!-- Ulica -->
                        <col> <!-- Nr domu -->
                        <col> <!-- Nr lokalu -->
                        <col> <!-- Miejscowość -->
                        <col> <!-- Kod pocztowy -->
                        <col> <!-- Telefon -->
                        <col> <!-- Email -->
                        <col class="w-32"> <!-- Zdolność kredytowa / status -->
                        <col class="w-32"> <!-- Uwagi / akcje -->
                    </colgroup>

                    <thead class="dark:bg-gray-300">
                        <tr class="text-left">
                            <th class="p-3">{{ __('clients.attributes.id') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Imie') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Nazwisko') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Nazwa_Firmy') }}</th>
                            <th class="p-3">{{ __('clients.attributes.PESEL_NIP') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Adres_Ulica') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Adres_Nr_Domu') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Adres_Nr_Lokalu') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Adres_Miejscowosc') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Adres_Kod_Pocztowy') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Nr_Telefonu') }}</th>
                            <th class="p-3">{{ __('clients.attributes.Email_Adres') }}</th>
                            <th class="p-3 text-center">{{ __('clients.attributes.Zdolnosc_Kredytowa') }}</th>
                            <th class="p-3 text-center">{{ __('clients.attributes.Uwagi') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clients as $client)
                            <tr class="border-b border-opacity-20 dark:border-gray-300 dark:bg-gray-50">
                                <td class="p-3">
                                    <p class="font-medium">{{ $client->id }}</p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->Imie }}</p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->Nazwisko }}</p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->Nazwa_Firmy }}</p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->PESEL_NIP }}</p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->Adres_Ulica }}</p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->Adres_Nr_Domu }}</p>
                                </td>

                                <td class="p-3">
                                    <p>
                                        @if($client->Adres_Nr_Lokalu)
                                            {{ $client->Adres_Nr_Lokalu }}
                                        @else
                                            —
                                        @endif
                                    </p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->Adres_Miejscowosc }}</p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->Adres_Kod_Pocztowy }}</p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->Nr_Telefonu }}</p>
                                </td>

                                <td class="p-3">
                                    <p>{{ $client->Email_Adres }}</p>
                                </td>

                                <td class="p-3 text-center">
                                    <p>{{ $client->Zdolnosc_Kredytowa }}
                                </td>

                                <td class="p-3 text-left">
                                    <p class="truncate max-w-xs">{{ $client->Uwagi }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $clients->links() }}
            </div>
        </div>
    </section>
</x-layouts.app>