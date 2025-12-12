<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\Auth\PermissionType;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => PermissionType::USER_ACCESS->value]);
        Permission::create(['name' => PermissionType::USER_ACCESSSELF->value]);
        Permission::create(['name' => PermissionType::USER_MANAGE-> value]);
        Permission::create(['name' => PermissionType::USER_ROLE_UPDATE-> value]);
        
        Permission::create(['name' => PermissionType::WORKER_ACCESS->value]);
        Permission::create(['name' => PermissionType::WORKER_MANAGE->value]);

        Permission::create(['name' => PermissionType::RACHUNEK_ACCESS->value]);
        Permission::create(['name' => PermissionType::RACHUNEK_MANAGE->value]);

        Permission::create(['name' => PermissionType::RACHUNEK_TYP_ACCESS->value]);
        Permission::create(['name' => PermissionType::RACHUNEK_TYP_MANAGE->value]);
        
    }
}
