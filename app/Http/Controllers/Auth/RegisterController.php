<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'string'],
            'passwordConfirmation' => ['required', 'string', 'same:password']
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = RoleEnum::CUSTOMER;
        $validated['email_verified_at'] = now();

        $user = User::query()->create($validated);

        Auth::login($user);
        $request->session()->regenerate();

        return to_route('home')->with('success', 'Your registration successfully');
    }
}
