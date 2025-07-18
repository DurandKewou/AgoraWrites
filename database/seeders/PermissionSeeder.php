<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Définir les permissions par rôle
        $roles_permissions = [
            'Admin' => [ // 👈 attention à garder un seul nom de rôle
                'edit_user',
                'delete_user',
                'delete_post',
                'view_post',
                'revoke_access',
                'create_post',
                'edit_post',
            ],
            'Author' => [
                'create_post',
                'edit_post',
                'delete_post',
                'view_post',
            ],
            'Lecteur' => [
                'view_post',
            ],
        ];

        foreach ($roles_permissions as $role_name => $permissions) {
            $role = Role::firstOrCreate(['name' => $role_name]);

            foreach ($permissions as $permission_name) {
                $permission = Permission::firstOrCreate(['name' => $permission_name]);
                $role->givePermissionTo($permission);
            }
        }

        // Facultatif : donner toutes les permissions à l'administrateur
        $adminRole = Role::where('name', 'Admin')->first();
        if ($adminRole) {
            $adminRole->syncPermissions(Permission::all());
        }
    }
}
