<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = Role::all();
        return view('admin.user.create', compact('user', 'roles'));
    }

    public function store()
    {
        $validatedData = $this->validatedData();
        Arr::set($validatedData, 'password', Hash::make($validatedData['password']));
        $user = User::create(Arr::except($validatedData, 'roles'));
        $user->roles()->sync($validatedData['roles']);
        return redirect()->route('admin.users.show', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('edit-users')) {
            return redirect(route('admin.users.index'));
        }
        $roles = Role::all();

        return view('admin.user.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $validatedData = $this->validatedData();
        Arr::set($validatedData, 'password', Hash::make($validatedData['password']));
        $user->update(Arr::except($validatedData, 'roles'));
        $user->roles()->sync($validatedData['roles']);
        return redirect()->route('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('delete-users')) {
            return redirect(route('admin.users.index'));
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    private function validatedData()
    {
        return request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Category,name,' . ($this->author->id ?? '')],
            'roles' => 'required',
            'password' => ['sometimes', 'string', 'min:8']
        ]);
    }
}
