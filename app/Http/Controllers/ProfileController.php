<?php 
namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->where('id',Auth::id())->get();
        // $profile = $user->profile;
        

        return view('profile.index', compact('profile'));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            // Add other validation rules for profile fields here
        ]);

        $user = Auth::user();
        $user->profile()->create($request->all());

        return redirect()->route('profile.index')->with('success', 'Profile created successfully.');
    }

    public function edit()
    {
        $profile = Auth::user()->where('id',Auth::id())->get();

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            // Add other validation rules for profile fields here
        ]);

        $user = Auth::user();
        $user->update($request->all());

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}
