<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TeamInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeTeamMember;
use App\Mail\TeamInvitation as TeamInvitationMail;

class TeamController extends Controller
{
    public function index()
    {
        $team_members = User::all();
        return view('team.index', compact('team_members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|string|in:member,admin',
            'password' => \Str::random(10) // Generate random password for team member
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password'])
        ]);

        Mail::to($user->email)->send(new WelcomeTeamMember($validated['password'], $validated['name']));
        
        return redirect()->route('team.index')->with('success', 'Team member added successfully');
    }
    public function invite()
    {
        return view('team.invite');
    }

    public function sendInvite(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:member,admin'
        ]);

        $token = Str::random(32);
        
        // Store invitation
        $invitation = TeamInvitation::create([
            'email' => $validated['email'],
            'role' => $validated['role'],
            'token' => $token,
            'expires_at' => now()->addDays(2)
        ]);

        // Send email
        try {
            Mail::to($validated['email'])->send(new TeamInvitationMail([
                'email' => $validated['email'],
                'role' => $validated['role'],
                'token' => $token,
                'acceptUrl' => route('team.accept-invite', ['token' => $token])
            ]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send invitation email: ' . $e->getMessage());
        }

        return redirect()->route('team.index')->with('success', 'Invitation sent successfully');
    }
    public function acceptInvite($token)
    {
        $invitation = TeamInvitation::where('token', $token)
            ->where('expires_at', '>', now())
            ->firstOrFail();

        $user = User::create([
            'name' => request()->input('name', 'New Team Member'),
            'email' => $invitation->email,
            'role' => $invitation->role,
            'password' => Hash::make(Str::random(12))
        ]);

        $invitation->delete();

        return redirect()->route('team.index')
            ->with('success', 'Welcome to the team!');
    }
}
