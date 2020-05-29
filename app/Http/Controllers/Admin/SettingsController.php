<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Settings $settings)
    {
        $validatedData = request()->validate([
            'bank_name' => 'required',
            'bank_account_number' => 'required|numeric'
        ]);
        $settings->put($validatedData);
        return back();
    }
}
