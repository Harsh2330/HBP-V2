<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display a list of users
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('unique_id', 'like', '%' . $request->search . '%');
        }

        $users = $query->paginate(5); // Retrieve 5 users per page
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
            'usertype' => 'required|in:doctor,admin,patient,nurse',
        ]);

        $currentYear = date('Y');
        $prefix = strtoupper(substr($request->usertype, 0, 3));
        $lastUser = User::where('usertype', $request->usertype)->whereYear('created_at', $currentYear)->orderBy('id', 'desc')->first();
        $sequenceNumber = $lastUser ? intval(substr($lastUser->unique_id, -4)) + 1 : 1;
        $uniqueId = sprintf('%s-%s-%04d', $prefix, $currentYear, $sequenceNumber);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->usertype = $request->usertype;
        $user->unique_id = $uniqueId; // Generate a unique ID for the user
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
            'usertype' => 'required|in:doctor,admin,patient,nurse',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        if ($user->usertype !== $request->usertype) {
            $currentYear = date('Y');
            $prefix = strtoupper(substr($request->usertype, 0, 3));
            $lastUser = User::where('usertype', $request->usertype)->whereYear('created_at', $currentYear)->orderBy('id', 'desc')->first();
            $sequenceNumber = $lastUser ? intval(substr($lastUser->unique_id, -4)) + 1 : 1;
            $uniqueId = sprintf('%s-%s-%04d', $prefix, $currentYear, $sequenceNumber);
            $user->unique_id = $uniqueId;
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
