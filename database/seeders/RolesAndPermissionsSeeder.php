<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Create roles
          $adminRole = Role::create(['name' => 'admin']);
          $supervRole = Role::create(['name' => 'supervisor']);
          $bodegaRole = Role::create(['name' => 'bodega']);
          $secreRole  = Role::create(['name' => 'secretaria']);
  
          /* Create permissions
          $createPostPermission = Permission::create(['name' => 'create post']);
          $editPostPermission = Permission::create(['name' => 'edit post']);
          $deletePostPermission = Permission::create(['name' => 'delete post']);
  
          // Assign permissions to roles
          $adminRole->givePermissionTo($createPostPermission);
          $adminRole->givePermissionTo($editPostPermission);
          $adminRole->givePermissionTo($deletePostPermission);
  
          $editorRole->givePermissionTo($createPostPermission);
          $editorRole->givePermissionTo($editPostPermission);
  
          $userRole->givePermissionTo($createPostPermission)*/
    }
}
