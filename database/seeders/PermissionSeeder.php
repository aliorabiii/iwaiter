<?php
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'homepage-view',
            'homepage-edit',
            'course-create',
            'course-edit',
            'course-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles safely
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->givePermissionTo(['course-create', 'course-edit']);

        $viewer = Role::firstOrCreate(['name' => 'viewer']);
        $viewer->givePermissionTo(['homepage-view']);
    }
}
