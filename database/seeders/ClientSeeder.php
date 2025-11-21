<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'Imie' => 'Jan',
            'Nazwisko' => 'Kowalski',
            'Nazwa_Firmy' => 'Kowalex',
            'PESEL_NIP' => '12345678901',
            'Adres_Ulica' => 'Mickiewicza',
            'Adres_Nr_Domu' => '10',
            'Adres_Nr_Lokalu' => '5',
            'Adres_Miejscowosc' => 'Warszawa',
            'Adres_Kod_Pocztowy' => '66-001',
            'Nr_Telefonu' => '606706600',
            'Email_Adres' => 'jan.kowalski@egmail.com',
            'Zdolnosc_Kredytowa' => 'Wysoka',
            'Uwagi' => 'brak',
            
        ]);

        Client::factory()->count(50)->create();
    }
}
