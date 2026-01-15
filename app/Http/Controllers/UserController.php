<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $userStoreRequest)
    {
        $validated = $userStoreRequest->validated();
        $user = User::create($validated);

        return redirect()->route('users.show', $user)->with('success', 'Benutzer erfolgreich erstellt');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("users.show", ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("users.edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $userUpdateRequest, User $user)
    {
        $validated = $userUpdateRequest->validated();

        $user->update($validated);

        return redirect()->route("users.show", $user)->with('success', 'Benutzer erfolgreich aktualisiert');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("users.index");
    }
}