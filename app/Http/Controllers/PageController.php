<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages',
            'content' => 'required|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        Page::create($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,'.$page->id,
            'content' => 'required|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $page->update($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }
    // Add to PageController
public function toggleStatus(Page $page)
{
    $page->update(['is_active' => !$page->is_active]);
    
    return redirect()->route('admin.pages.index')
        ->with('success', 'Page status updated successfully.');
}
}