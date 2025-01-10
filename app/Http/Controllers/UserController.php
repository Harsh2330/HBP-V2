<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display a list of users
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('user.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('user.create');
    }

    // Store a newly created user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'usertype' => 'required|in:doctor,admin,patient',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->route('admin.user.index')->with('status', 'User created successfully!');
    }

    // Show the form for editing a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    // Update the specified user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'usertype' => 'required|in:doctor,admin,patient',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
