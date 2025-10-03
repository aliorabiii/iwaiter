<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::all();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:team_members,email', // adjust table name
        // add other fields validation
    ]);

    $team = new TeamMember(); // or whatever your model is
    $team->name = $request->name;
    $team->email = $request->email;
    // other fields
    $team->save();

return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
}

    public function edit(TeamMember $team_member)
    {
        return view('admin.team.edit', compact('team_member'));
    }

    public function update(Request $request, TeamMember $team_member)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'facebook_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('assets/images'), $imageName);
            $data['image'] = 'assets/images/' . $imageName;
        }

        $team_member->update($data);
        return redirect()->route('admin.team.index')->with('success', 'Team member updated.');
    }

    public function destroy(TeamMember $team_member)
    {
        $team_member->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted.');
    }
}
