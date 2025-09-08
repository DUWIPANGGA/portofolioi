<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::with('user')->orderBy('order')->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.skills.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'category' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer'
        ]);

        Skill::create($request->all());

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return view('admin.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        $users = User::all();
        return view('admin.skills.edit', compact('skill', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'category' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer'
        ]);

        $skill->update($request->all());

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}
