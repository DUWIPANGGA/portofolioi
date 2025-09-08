<?php

namespace App\Http\Controllers;

use App\Models\ThemeSetting;
use Illuminate\Http\Request;

class ThemeSettingController extends Controller
{
    public function edit(ThemeSetting $themeSetting)
    {
        return view('admin.theme_settings.edit', compact('themeSetting'));
    }

    public function update(Request $request, ThemeSetting $themeSetting)
{
    // Pastikan user hanya bisa mengedit theme setting miliknya sendiri
    if ($themeSetting->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }
    
    $validated = $request->validate([
        'primary_color' => 'required|string|max:20',
        'secondary_color' => 'required|string|max:20',
        'dark_mode_primary' => 'required|string|max:20',
        'dark_mode_secondary' => 'required|string|max:20',
        'font_family' => 'required|string|max:50',
        'enable_neumorphism' => 'boolean'
    ]);
    
    // Tidak perlu menambahkan user_id lagi untuk update
    $themeSetting->update($validated);

    return redirect()->route('admin.dashboard')
        ->with('success', 'Theme settings updated successfully.');
}
public function index()
{
    $themeSetting = ThemeSetting::where('user_id', auth()->id())->first();
    
    if (!$themeSetting) {
        $themeSetting = ThemeSetting::create([
            'user_id' => auth()->id(),
            'primary_color' => '#3b82f6',
            'secondary_color' => '#6b7280',
            'dark_mode_primary' => '#3b82f6',
            'dark_mode_secondary' => '#4b5563',
            'font_family' => 'Inter, sans-serif',
            'enable_neumorphism' => true
        ]);
    }
    
    return view('admin.theme_settings.index', compact('themeSetting'));
}
}