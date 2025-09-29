<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // NO CONSTRUCTOR - middleware is handled in routes
    
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'roles' => 'array',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'roles' => 'array',
        'direct_permissions' => 'array',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    // Sync roles
    if ($request->has('roles')) {
        $user->syncRoles($request->roles);
    }

    // Sync direct permissions (if Super Admin)
    if ($request->has('direct_permissions') && auth()->user()->hasRole('Super Admin')) {
        $user->syncPermissions($request->direct_permissions);
    }

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}

    public function destroy(User $user)
    {
        // Prevent deletion of SuperAdmin users
        if ($user->hasRole('SuperAdmin')) {
            return redirect()->route('users.index')->with('error', 'Cannot delete SuperAdmin user.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}