<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'required|string|max:255',
            'client_company' => 'required|string|max:255',
            'client_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer'
        ]);
$validated['user_id'] = Auth::user()->id;

        if ($request->hasFile('client_avatar')) {
            $validated['client_avatar'] = $request->file('client_avatar')->store('testimonials');
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'required|string|max:255',
            'client_company' => 'required|string|max:255',
            'client_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('client_avatar')) {
            // Delete old avatar if exists
            if ($testimonial->client_avatar) {
                Storage::delete($testimonial->client_avatar);
            }
            $validated['client_avatar'] = $request->file('client_avatar')->store('testimonials');
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        // Delete avatar if exists
        if ($testimonial->client_avatar) {
            Storage::delete($testimonial->client_avatar);
        }
        
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}