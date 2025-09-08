<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomSection;

class CustomSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = CustomSection::query();
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('section_name', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
        }
        
        // Filter by status
        if ($request->has('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }
        
        // Sorting
        $sortField = $request->get('sort', 'order');
        $sortDirection = $request->get('direction', 'asc');
        $query->orderBy($sortField, $sortDirection);
        
        $sections = $query->paginate(10);
        
        return view('admin.custom_sections.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.custom_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_name' => 'required|string|max:255|unique:custom_sections,section_name',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'custom_data' => 'nullable|json'
        ]);

        // Set user_id to current user
        $validated['user_id'] = auth()->id();
        
        CustomSection::create($validated);

        return redirect()->route('admin.custom_sections.index')
            ->with('success', 'Custom section created successfully.');
    }

    public function show(CustomSection $customSection)
    {
        return view('admin.custom_sections.show', compact('customSection'));
    }

    public function edit(CustomSection $customSection)
    {
        return view('admin.custom_sections.edit', compact('customSection'));
    }

    public function update(Request $request, CustomSection $customSection)
    {
        $validated = $request->validate([
            'section_name' => 'required|string|max:255|unique:custom_sections,section_name,'.$customSection->id,
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'custom_data' => 'nullable|json'
        ]);

        $customSection->update($validated);

        return redirect()->route('admin.custom_sections.index')
            ->with('success', 'Custom section updated successfully.');
    }

    public function destroy(CustomSection $customSection)
    {
        $customSection->delete();

        return redirect()->route('admin.custom_sections.index')
            ->with('success', 'Custom section deleted successfully.');
    }

    public function toggleActive(CustomSection $customSection)
    {
        $customSection->update([
            'is_active' => !$customSection->is_active
        ]);

        return redirect()->route('admin.custom_sections.index')
            ->with('success', 'Section status updated successfully.');
    }
}