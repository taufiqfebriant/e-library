<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Book;
use App\DataTables\BooksDataTable;
use App\DataTables\TransactionsDataTable;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function show(User $user)
    {
        $this->authorize('show-user', $user);
        return view('user.show', compact('user'));
    }
    
    public function personalInfo(User $user)
    {
        $this->authorize('show-user', $user);
        return view('user.personal-info', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('show-user', $user);
        return view('user.edit', compact('user'));
    }
    
    public function update(User $user)
    {
        $this->authorize('show-user', $user);
        $validatedData = request()->validate([
            'name' => 'required',
            'age' => 'nullable|numeric',
            'address' => 'nullable',
            'phone_number' => 'nullable',
            'whatsapp' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable'
        ]);
        auth()->user()->update(Arr::only($validatedData, ['name']));
        auth()->user()->profile()->updateOrCreate(['user_id' => auth()->user()->id], Arr::except($validatedData, ['name']));
        return redirect()->route('users.personal-info', compact('user'))->with(['type' => 'success', 'message' => 'Berhasil mengubah data pribadi.']);
    }

    public function books(User $user, BooksDataTable $dataTable)
    {
        $this->authorize('show-user', $user);
        return $dataTable->render('user.books', compact('user'));
    }
    
    public function transactions(User $user, TransactionsDataTable $dataTable)
    {
        $this->authorize('show-user', $user);
        return $dataTable->render('user.transactions', compact('user'));
    }

    public function returnBook(User $user, Book $book)
    {
        $this->authorize('show-user', $user);
        auth()->user()->books()->wherePivot('book_id', '=', $book->id)->update([
            'returned_at' => Carbon::now()
        ]);
        return back()->with(['type' => 'success', 'message' => 'Berhasil mengembalikan buku.']);
    }

    public function changePassword(User $user)
    {
        $this->authorize('show-user', $user);
        return view('user.change-password', compact('user'));
    }

    public function updatePassword(User $user)
    {
        $this->authorize('show-user', $user);
        request()->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);
        auth()->user()->update(['password' => Hash::make(request()->password)]);
        return redirect()->route('users.show', compact('user'))->with(['type' => 'success', 'message' => 'Berhasil mengubah kata sandi.']);
    }
}
