<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
        'Imie' => $this->faker->firstName(),
        'Nazwisko' => $this->faker->lastName(),
        'Nazwa_Firmy' => $this->faker->company(),
        'PESEL_NIP' => $this->faker->unique()->numerify('###########'),
        'Adres_Ulica' => $this->faker->streetName(),
        'Adres_Nr_Domu' => $this->faker->buildingNumber(),
        'Adres_Nr_Lokalu' => $this->faker->optional()->numerify('##'),
        'Adres_Miejscowosc' => $this->faker->city(),
        'Adres_Kod_Pocztowy' => $this->faker->regexify('[0-9]{2}-[0-9]{3}'),
        'Nr_Telefonu' => $this->faker->unique()->phoneNumber(),
        'Email_Adres' => $this->faker->unique()->safeEmail(),
        'Zdolnosc_Kredytowa' => $this->faker->optional()->word(),
        'Uwagi' => $this->faker->optional()->sentence(),
        ];
    }
}
