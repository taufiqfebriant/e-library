<?php

namespace App\Http\Controllers;

class ToastController extends Controller
{
    public function store()
    {
        session()->flash('type', request()->type);
        session()->flash('message', request()->message);
        dd(session('type'));
    }
}
