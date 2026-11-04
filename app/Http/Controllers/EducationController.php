<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('order')->orderBy('start_date', 'desc')->paginate(10);
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'degree'        => 'required|string|max:255',
            'institution'   => 'required|string|max:255',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'logo_url'      => 'nullable|url|max:500',
            'field_of_study'=> 'nullable|string|max:255',
            'gpa'           => 'nullable|numeric|min:0|max:100',
            'gpa_max'       => 'nullable|numeric|min:0|max:100',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
            'order'         => 'nullable|integer'
        ]);

        $data = $validated;
        unset($data['logo_url']);

        // Format tanggal
        $data['start_date'] = Carbon::parse($validated['start_date'])->toDateString();
        $data['end_date']   = Carbon::parse($validated['end_date'])->toDateString();
        $data['user_id']    = Auth::id();

        // Upload logo file atau pakai URL
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('educations/logos', 'public');
        } elseif ($request->filled('logo_url')) {
            $data['logo'] = $request->input('logo_url');
        }

        Education::create($data);

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
            'degree'        => 'required|string|max:255',
            'institution'   => 'required|string|max:255',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'logo_url'      => 'nullable|url|max:500',
            'remove_logo'   => 'nullable|boolean',
            'field_of_study'=> 'nullable|string|max:255',
            'gpa'           => 'nullable|numeric|min:0|max:100',
            'gpa_max'       => 'nullable|numeric|min:0|max:100',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
            'order'         => 'nullable|integer'
        ]);
        
        $data = $validated;
        unset($data['logo_url'], $data['remove_logo']);

        $data['start_date'] = Carbon::parse($validated['start_date'])->toDateString();
        $data['end_date']   = Carbon::parse($validated['end_date'])->toDateString();

        if ($request->boolean('remove_logo')) {
            if ($education->logo && !str_starts_with($education->logo, 'http')) {
                Storage::disk('public')->delete($education->logo);
            }
            $data['logo'] = null;
        } elseif ($request->hasFile('logo')) {
            if ($education->logo && !str_starts_with($education->logo, 'http')) {
                Storage::disk('public')->delete($education->logo);
            }
            $data['logo'] = $request->file('logo')->store('educations/logos', 'public');
        } elseif ($request->filled('logo_url')) {
            if ($education->logo && !str_starts_with($education->logo, 'http')) {
                Storage::disk('public')->delete($education->logo);
            }
            $data['logo'] = $request->input('logo_url');
        }
        
        $education->update($data);

        return redirect()->route('admin.educations.index')
            ->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        if ($education->logo && !str_starts_with($education->logo, 'http')) {
            Storage::disk('public')->delete($education->logo);
        }

        $education->delete();

        return redirect()->route('admin.educations.index')
            ->with('success', 'Education deleted successfully.');
    }
}
