<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('start_date', 'desc')->paginate(10);
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'degree' => 'required|string|max:255',
        'institution' => 'required|string|max:255',
        'field_of_study' => 'nullable|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date', // ✅ allow same date
        'order' => 'nullable|integer'
    ]);

    // pastiin format date ke YYYY-MM-DD
    $validated['start_date'] = Carbon::parse($validated['start_date'])->toDateString();
    $validated['end_date']   = Carbon::parse($validated['end_date'])->toDateString();

    $validated['user_id'] = Auth::id();

    Education::create($validated);

    return redirect()->route('admin.educations.index')
        ->with('success', 'Education created successfully.');
}

    public function show(Education $education)
    {
        return view('admin.educations.show', compact('education'));
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
{
    $validated = $request->validate([
        'degree' => 'required|string|max:255',
        'institution' => 'required|string|max:255',
        'field_of_study' => 'nullable|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'order' => 'nullable|integer'
    ]);
    
    // pastikan format konsisten YYYY-MM-DD
    $validated['start_date'] = Carbon::parse($validated['start_date'])->toDateString();
    $validated['end_date']   = Carbon::parse($validated['end_date'])->toDateString();
    
    $education->update($validated);
    // dd($validated);

    return redirect()->route('admin.educations.index')
        ->with('success', 'Education updated successfully.');
}

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('admin.educations.index')
            ->with('success', 'Education deleted successfully.');
    }
}
