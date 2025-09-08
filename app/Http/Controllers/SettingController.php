<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'value' => 'required'
        ]);

        $setting->update($validated);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting updated successfully.');
    }

    // Note: Typically settings are not created/deleted via CRUD interface
    // They are usually predefined in the system
}