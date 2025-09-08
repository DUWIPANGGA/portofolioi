<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('category')->orderBy('order')->paginate(10);
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'is_checked' => 'boolean',
            'order' => 'nullable|integer'
        ]);
$validated['user_id'] = auth()->id();
        Technology::create($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology created successfully.');
    }

    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
// dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'is_checked' => 'boolean',
            'order' => 'nullable|integer'
        ]);
        $validated['user_id'] = auth()->id();

        $technology->update($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology updated successfully.');
    }

    public function destroy(Technology $technology)
    {
        // Detach from projects first
        $technology->projects()->detach();
        
        $technology->delete();

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology deleted successfully.');
    }
}