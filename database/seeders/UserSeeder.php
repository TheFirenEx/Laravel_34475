<?php

namespace Database\Seeders;

use App\Enums\Auth\RoleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create()->withoutt;

        \App\Models\User::factory()->create([
            'name' => 'Użytkownik Testowy',
            'email' => 'user.test@loclahost',
            'password' => Hash::make('12345678')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pracownik Testowy',
            'email' => 'worker.test@loclahost',
            'password' => Hash::make('12345678')
        ])->assignRole(RoleType::WORKER->value);

        \App\Models\User::factory()->create([
            'name' => 'Administrator Testowy',
            'email' => 'admin.test@loclahost',
            'password' => Hash::make('12345678')
        ])->assignRole(RoleType::ADMIN->value);
    }
}
