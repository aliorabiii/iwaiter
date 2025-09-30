<?php


namespace App\Http\Controllers\Admin;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;





class TeamMemberController extends Controller
{
   public function index()
    {
        // Fetch all team members from DB
        $teamMembers = TeamMember::all();

        // Pass to the view
        return view('admin.team.index', compact('teamMembers'));
    }
    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        // Upload image
        if($request->hasFile('image')){
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('assets/images'), $imageName);
        }

        TeamMember::create([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $imageName ?? null,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'nullable|string|max:255',
        ]);

        // Update the member
        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully!');
    }


public function destroy($id)
{
    $member = TeamMember::findOrFail($id);
    $member->delete();

    return redirect()->route('admin.team.index')->with('success', 'Member deleted successfully.');
}
}
