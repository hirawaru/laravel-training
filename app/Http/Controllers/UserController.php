<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Response;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //without eager loading
    //Select * from users where user_id = 1;
    //with eager loading
    //Select * from users
    //Select * form tasks where user_id in
    // return view('users.index', [
    //        'users' => User::with('tasks')->get()
    //    ]);
    //lazy eager loading
    // $users = User::all();
    // $users->load('tasks');
    // return view('users.index', [
    //     'users' => User::all()->load('tasks')
    // ]);
    public function index()
    {
        //
        return view('users.index', [
            'users' => User::with('tasks')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        // 
        $validatedData = $request->validated();
        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        //$validatedData = $request->validated();
        //$user->update($validatedData);

        //return redirect()->route('users.index')->with('success', 'User updated successfully.');
        DB::table('users')
            ->where('id', $user->id)
            ->update(['username' => $request->username]);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
