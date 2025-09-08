<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentProcess;
use Illuminate\Http\Request;

class DevelopmentProcessController extends Controller
{
    public function index()
    {
        $processes = DevelopmentProcess::orderBy('step_number')->paginate(10);
        return view('admin.development_processes.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.development_processes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'step_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        DevelopmentProcess::create($validated);

        return redirect()->route('admin.development_processes.index')
            ->with('success', 'Development process step created successfully.');
    }

    public function show(DevelopmentProcess $developmentProcess)
    {
        return view('admin.development_processes.show', compact('developmentProcess'));
    }

    public function edit(DevelopmentProcess $developmentProcess)
    {
        return view('admin.development_processes.edit', compact('developmentProcess'));
    }

    public function update(Request $request, DevelopmentProcess $developmentProcess)
    {
        $validated = $request->validate([
            'step_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $developmentProcess->update($validated);

        return redirect()->route('admin.development_processes.index')
            ->with('success', 'Development process step updated successfully.');
    }

    public function destroy(DevelopmentProcess $developmentProcess)
    {
        $developmentProcess->delete();

        return redirect()->route('admin.development_processes.index')
            ->with('success', 'Development process step deleted successfully.');
    }
}