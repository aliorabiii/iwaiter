<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // REMOVE THIS CONSTRUCTOR COMPLETELY or fix it:
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:Super Admin'); // This causes the error
    // }

    public function index()
    {
        // Manual permission check instead of constructor middleware
        if (!auth()->user()->hasRole('Super Admin')) {
            abort(403, 'Unauthorized action.');
        }

        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        if (!auth()->user()->hasRole('Super Admin')) {
            abort(403, 'Unauthorized action.');
        }

        $permissions = Permission::all()->groupBy(function($permission) {
            return explode('-', $permission->name)[0];
        });
        
        return view('roles.create', compact('permissions'));
    }

public function store(Request $request)
{
    if (!auth()->user()->hasRole('Super Admin')) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'name' => 'required|unique:roles,name',
        'permissions' => 'array',
    ]);

    $role = Role::create(['name' => $request->name]);
    
    if ($request->has('permissions')) {
        $role->syncPermissions($request->permissions);
    }

    return redirect()->route('roles.index')->with('success', 'Role created successfully.');
}

  public function edit(Role $role)
{
    if (!auth()->user()->hasRole('Super Admin')) {
        abort(403, 'Unauthorized action.');
    }

    // Prevent editing of Super Admin role
    if ($role->name === 'Super Admin') {
        return redirect()->route('roles.index')->with('error', 'Cannot edit Super Admin role.');
    }

    // Get all permissions and group them properly
    $allPermissions = Permission::all();
    
    $permissions = $allPermissions->groupBy(function($permission) {
        // Group by the first part of the permission name (before first dash)
        $parts = explode('-', $permission->name);
        return $parts[0];
    });

    \Log::info('Edit role permissions:', [
        'role' => $role->name,
        'role_permissions' => $role->permissions->pluck('name')->toArray(),
        'grouped_permissions' => $permissions->map(function($group) {
            return $group->pluck('name');
        })
    ]);

    return view('roles.edit', compact('role', 'permissions'));
}

  public function update(Request $request, Role $role)
{
    if (!auth()->user()->hasRole('Super Admin')) {
        abort(403, 'Unauthorized action.');
    }

    // Prevent updating Super Admin role
    if ($role->name === 'Super Admin') {
        return redirect()->route('roles.index')->with('error', 'Cannot update Super Admin role.');
    }

    $request->validate([
        'name' => 'required|unique:roles,name,' . $role->id,
        'permissions' => 'array',
    ]);

    \Log::info('Updating role:', [
        'role_id' => $role->id,
        'role_name' => $role->name,
        'new_name' => $request->name,
        'permissions_count' => $request->has('permissions') ? count($request->permissions) : 0,
        'permissions' => $request->permissions
    ]);

    $role->update(['name' => $request->name]);
    
    if ($request->has('permissions')) {
        $role->syncPermissions($request->permissions);
        
        \Log::info('Permissions after sync:', [
            'role_permissions' => $role->permissions->pluck('name')->toArray()
        ]);
    } else {
        $role->syncPermissions([]);
    }

    return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
}

    public function destroy(Role $role)
    {
        if (!auth()->user()->hasRole('Super Admin')) {
            abort(403, 'Unauthorized action.');
        }

        if ($role->name === 'Super Admin') {
            return redirect()->route('roles.index')->with('error', 'Cannot delete Super Admin role.');
        }

        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}