<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // First, check if description column exists
        $hasDescriptionColumn = \Schema::hasColumn('permissions', 'description');
        
        // Create permissions specifically for your restaurant marketing website
        $permissionNames = [
            // Dashboard
            'dashboard-view',
            
            // Homepage Sections Management
            'homepage-view', 'homepage-edit',
            'steps-section-view', 'steps-section-edit',
            'courses-view', 'courses-create', 'courses-edit', 'courses-delete',
            'restaurant-logos-view', 'restaurant-logos-create', 'restaurant-logos-edit', 'restaurant-logos-delete',
            'smart-service-view', 'smart-service-edit',
            
            // About Us Page
            'about-us-view', 'about-us-edit',
            
            // Features Page
            'features-view', 'features-edit',
            
            // Services Page
            'services-view', 'services-edit',
            
            // Testimonials Management
            'testimonials-view', 'testimonials-create', 'testimonials-edit', 'testimonials-delete',
            
            // Contact Us Page & Messages
            'contact-page-view', 'contact-page-edit',
            'contact-messages-view', 'contact-messages-delete',
            
            // User Management (Admins)
            'users-view', 'users-create', 'users-edit', 'users-delete',
            
            // Role Management
            'roles-view', 'roles-create', 'roles-edit', 'roles-delete',
            
            // Settings
            'settings-view', 'settings-edit',
        ];

        foreach ($permissionNames as $permissionName) {
            $permissionData = ['name' => $permissionName];
            
            // Only add description if the column exists
            if ($hasDescriptionColumn) {
                $descriptions = [
                    'dashboard-view' => 'View admin dashboard',
                    'homepage-view' => 'View homepage content',
                    'homepage-edit' => 'Edit homepage content',
                    'steps-section-view' => 'View 3 Easy Steps section',
                    'steps-section-edit' => 'Edit 3 Easy Steps content',
                    'courses-view' => 'View latest courses',
                    'courses-create' => 'Create new courses',
                    'courses-edit' => 'Edit existing courses',
                    'courses-delete' => 'Delete courses',
                    'restaurant-logos-view' => 'View restaurant logos',
                    'restaurant-logos-create' => 'Add new restaurant logos',
                    'restaurant-logos-edit' => 'Edit restaurant logos',
                    'restaurant-logos-delete' => 'Delete restaurant logos',
                    'smart-service-view' => 'View Smart Service section',
                    'smart-service-edit' => 'Edit Smart Service content',
                    'about-us-view' => 'View About Us page',
                    'about-us-edit' => 'Edit About Us content',
                    'features-view' => 'View Features page',
                    'features-edit' => 'Edit Features content',
                    'services-view' => 'View Services page',
                    'services-edit' => 'Edit Services content',
                    'testimonials-view' => 'View testimonials',
                    'testimonials-create' => 'Create new testimonials',
                    'testimonials-edit' => 'Edit testimonials',
                    'testimonials-delete' => 'Delete testimonials',
                    'contact-page-view' => 'View contact page',
                    'contact-page-edit' => 'Edit contact page content',
                    'contact-messages-view' => 'View contact form submissions',
                    'contact-messages-delete' => 'Delete contact messages',
                    'users-view' => 'View users list',
                    'users-create' => 'Create new users',
                    'users-edit' => 'Edit users',
                    'users-delete' => 'Delete users',
                    'roles-view' => 'View roles',
                    'roles-create' => 'Create new roles',
                    'roles-edit' => 'Edit roles',
                    'roles-delete' => 'Delete roles',
                    'settings-view' => 'View settings',
                    'settings-edit' => 'Edit settings',
                ];
                
                $permissionData['description'] = $descriptions[$permissionName] ?? null;
            }
            
            Permission::firstOrCreate(
                ['name' => $permissionData['name']],
                $permissionData
            );
        }

        // Create roles for your restaurant system
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $contentManager = Role::firstOrCreate(['name' => 'Content Manager']);
        $viewer = Role::firstOrCreate(['name' => 'Viewer']);

        // Super Admin gets all permissions
        $superAdmin->syncPermissions(Permission::all());

        // Content Manager gets content editing permissions
        $contentManagerPermissions = [
            // Dashboard
            'dashboard-view',
            
            // Homepage
            'homepage-view', 'homepage-edit',
            'steps-section-view', 'steps-section-edit',
            'courses-view', 'courses-create', 'courses-edit',
            'restaurant-logos-view', 'restaurant-logos-create', 'restaurant-logos-edit',
            'smart-service-view', 'smart-service-edit',
            
            // Pages
            'about-us-view', 'about-us-edit',
            'features-view', 'features-edit',
            'services-view', 'services-edit',
            'contact-page-view', 'contact-page-edit',
            
            // Testimonials
            'testimonials-view', 'testimonials-create', 'testimonials-edit',
            
            // Contact Messages
            'contact-messages-view',
        ];
        $contentManager->syncPermissions($contentManagerPermissions);

        // Viewer gets only view permissions
        $viewerPermissions = [
            'dashboard-view',
            'homepage-view',
            'courses-view',
            'restaurant-logos-view',
            'smart-service-view',
            'about-us-view',
            'features-view',
            'services-view',
            'contact-page-view',
            'testimonials-view',
            'contact-messages-view',
        ];
        $viewer->syncPermissions($viewerPermissions);

        // Create Super Admin user
        $superAdminUser = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password123'),
            ]
        );
        $superAdminUser->syncRoles([$superAdmin]);

        // Create Content Manager user
        $contentManagerUser = User::firstOrCreate(
            ['email' => 'content@example.com'],
            [
                'name' => 'Content Manager',
                'password' => bcrypt('password123'),
            ]
        );
        $contentManagerUser->syncRoles([$contentManager]);

        // Create Viewer user
        $viewerUser = User::firstOrCreate(
            ['email' => 'viewer@example.com'],
            [
                'name' => 'Viewer User', 
                'password' => bcrypt('password123'),
            ]
        );
        $viewerUser->syncRoles([$viewer]);

        // Create additional test users
        User::firstOrCreate(
            ['email' => 'ali@gmail.com'],
            ['name' => 'Ali', 'password' => bcrypt('password123')]
        );
    }
}