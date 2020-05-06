<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Transaction;

class UserController extends Controller
{
    public function show( User $user , Transaction $transaction , Book $book )
    {
        $transaksi = Transaction::where('user_id', auth()->user()->id)->get();

        // $bukus = Book::wherePivot('user_id', auth()->user()->id)->get();
        // dd(auth()->user()->books());exit;

        return view('user.show',compact(['user','transaksi']));
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
