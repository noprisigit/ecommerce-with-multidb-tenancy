<?php

namespace App\Http\Controllers\Tenant;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()
            ->where('role', RoleEnum::ADMINISTRATOR)
            ->get();

        return Inertia::render('Tenant/User/UserIndex', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Tenant/User/UserCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'string'],
            'passwordConfirmation' => ['required', 'string', 'same:password']
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = RoleEnum::ADMINISTRATOR;
        $validated['email_verified_at'] = now();

        User::query()->create($validated);

        return to_route('users.index')->with('success', 'New user has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render('Tenant/User/UserEdit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string'],
            'passwordConfirmation' => ['nullable', 'string', 'same:password']
        ]);

        if (isset($validated['password']) && !empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            $validated['password'] = $user->password;
        }

        $user->update($validated);

        return to_route('users.index')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return to_route('users.index')->with('success', 'User has been deleted');
    }
}
