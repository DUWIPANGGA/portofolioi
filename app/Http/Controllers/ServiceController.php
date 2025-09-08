<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'icon' => 'required|string|max:50',
        'description' => 'required|string',
        'order' => 'nullable|integer'
    ]);

    // Add the current user's ID
    $validated['user_id'] = auth()->id();

    Service::create($validated);

    return redirect()->route('admin.services.index')
        ->with('success', 'Service created successfully.');
}

public function update(Request $request, Service $service)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'icon' => 'required|string|max:50',
        'description' => 'required|string',
        'order' => 'nullable|integer'
    ]);
    $validated['user_id'] = auth()->id();

    $service->update($validated);

    return redirect()->route('admin.services.index')
        ->with('success', 'Service updated successfully.');
}

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}