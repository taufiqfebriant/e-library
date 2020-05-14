<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function check()
    {
        return response()->json(['status' => auth()->check()]);
    }
}
