<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $currentYear = date('Y');
        $lastUser = User::whereYear('created_at', $currentYear)->orderBy('id', 'desc')->first();
        $sequenceNumber = $lastUser ? intval(substr($lastUser->unique_id, -4)) + 1 : 1;
        $uniqueId = sprintf('USR-%s-%04d', $currentYear, $sequenceNumber);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 'user', // Assign default usertype as 'patient'
            'unique_id' => $uniqueId, // Generate a unique ID for the user
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('patient.dashboard', absolute: false));
    }
}
