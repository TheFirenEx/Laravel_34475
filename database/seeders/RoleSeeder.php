<?php

namespace Database\Seeders;

use App\Enums\Auth\PermissionType;
use App\Enums\Auth\RoleType;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => RoleType::ADMIN]);
        Role::create(['name' => RoleType::WORKER]);
        Role::create(['name' => RoleType::USER]);
        
        // ADMINISTRATOR
        $userRole = Role::findByName(RoleType::ADMIN->value);
        $userRole->givePermissionTo(PermissionType::USER_ACCESS->value);
        $userRole->givePermissionTo(PermissionType::USER_MANAGE->value);
        $userRole->givePermissionTo(PermissionType::USER_ROLE_UPDATE->value);
        $userRole->givePermissionTo(PermissionType::WORKER_ACCESS->value);
        $userRole->givePermissionTo(PermissionType::WORKER_MANAGE->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_ACCESS->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_MANAGE->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_TYP_ACCESS->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_TYP_MANAGE->value);

        //WORKER
        $userRole = Role::findByName(RoleType::WORKER->value);
        $userRole->givePermissionTo(PermissionType::USER_ACCESS->value);
        $userRole->givePermissionTo(PermissionType::USER_MANAGE->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_ACCESS->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_MANAGE->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_TYP_ACCESS->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_TYP_MANAGE->value);

        //USER
        $userRole = Role::findByName(RoleType::USER->value);
        $userRole->givePermissionTo(PermissionType::USER_ACCESSSELF->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_ACCESS->value);
        $userRole->givePermissionTo(PermissionType::RACHUNEK_TYP_ACCESS->value);
    }
}
