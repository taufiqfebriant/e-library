<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show( User $user )
    {
        return view('user.show',compact('user'));
    }
    public function edit($id)
    {  
        $users = User::findOrFail($id);
        
        return view('user.edit',compact('users'));
    }
    public function update(Request $request , $id)
    {
        $validatedData = $request->validate([
            'whatsapp' => 'required|numeric',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required'
        ]);

        User::whereId($id)->update($validatedData);
        return redirect('/users/'.$id)->with('success','Success Updated');
    }
    public function changepassword(Request $request , $id)
    {
        $request->validate([
            'current_password' => ['required' , new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password']
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect('/users/'.$id)->with('success','Success Change Password');
    }
}
