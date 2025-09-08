<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->paginate(10);
        return view('admin.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experience.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'order' => 'nullable|integer'
        ]);
$validated['user_id'] = Auth::user()->id;

        Experience::create($validated);

        return redirect()->route('admin.experience.index')
            ->with('success', 'Experience created successfully.');
    }

    public function show(Experience $experience)
    {
        return view('admin.experience.show', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('admin.experience.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'order' => 'nullable|integer'
        ]);

        $experience->update($validated);

        return redirect()->route('admin.experience.index')
            ->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experience.index')
            ->with('success', 'Experience deleted successfully.');
    }
}