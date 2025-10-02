<?php
namespace Database\Seeders; 
use Illuminate\Database\Seeder;
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
            'footer-manage',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles safely
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->givePermissionTo(['course-create', 'course-edit','footer-manage']);

        $viewer = Role::firstOrCreate(['name' => 'viewer']);
        $viewer->givePermissionTo(['homepage-view']);

        
    }
}
