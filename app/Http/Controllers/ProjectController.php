<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technology;
use App\Models\ProjectTechnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technologies')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $technologies = Technology::all();
        return view('admin.projects.create', compact('technologies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects',
            'description' => 'required|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_date' => 'required|date',
            'client' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'case_study_url' => 'nullable|url',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id'
        ]);

        // add user id manually
        $validated['user_id'] = Auth::id();

        // handle file uploads
        $validated['image_path'] = $request->file('image_path')->store('projects');
        if ($request->hasFile('featured_image_path')) {
            $validated['featured_image_path'] = $request->file('featured_image_path')->store('projects/featured');
        }

        $project = Project::create($validated);

        // sync technologies with additional pivot data if needed
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load('technologies');
        return view('admin.projects.show', compact('project'));
    }

public function edit($id)
{
    $project = Project::with([])->findOrFail($id); // with() opsional
    $technologies = Technology::all();

    $data = $project->technologies;
    if ($data instanceof \Illuminate\Support\Collection) {
        $selectedTech = $data->pluck('id')->all();
    } elseif (is_array($data)) {
        $selectedTech = $data;
    } else {
        $selectedTech = [];
    }

    return view('admin.projects.edit', compact('project', 'technologies', 'selectedTech'));
}

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,'.$project->id,
            'description' => 'required|string',
            'image_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_date' => 'required|date',
            'client' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'case_study_url' => 'nullable|url',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        // Handle file uploads
        if ($request->hasFile('image_path')) {
            // Delete old image
            Storage::delete($project->image_path);
            $validated['image_path'] = $request->file('image_path')->store('projects');
        }

        if ($request->hasFile('featured_image_path')) {
            // Delete old featured image if exists
            if ($project->featured_image_path) {
                Storage::delete($project->featured_image_path);
            }
            $validated['featured_image_path'] = $request->file('featured_image_path')->store('projects/featured');
        }

        $project->update($validated);

        // Sync technologies with detaching
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete associated files
        Storage::delete($project->image_path);
        if ($project->featured_image_path) {
            Storage::delete($project->featured_image_path);
        }
        
        // Detach technologies
        $project->technologies()->detach();
        
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    // Optional: Method to handle custom pivot operations
    public function updateProjectTechnology(Request $request, $projectId, $technologyId)
    {
        $project = Project::findOrFail($projectId);
        $technology = Technology::findOrFail($technologyId);
        
        // Example: Update pivot data
        $project->technologies()->updateExistingPivot($technologyId, [
            'custom_field' => $request->custom_field // if you add more fields to pivot
        ]);

        return response()->json(['success' => true]);
    }
}