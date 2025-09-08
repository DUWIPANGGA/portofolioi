<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = FormSubmission::latest()->paginate(10);
        return view('admin.form_submissions.index', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_submissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'form_type' => 'required|string|max:255',
            'data' => 'required|array',
            'is_processed' => 'nullable|boolean'
        ]);

        FormSubmission::create([
            'form_type' => $request->form_type,
            'data' => json_encode($request->data),
            'is_processed' => $request->is_processed ?? false
        ]);

        return redirect()->route('admin.form-submissions.index')
            ->with('success', 'Form submission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormSubmission $formSubmission)
    {
        return view('admin.form_submissions.show', compact('formSubmission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormSubmission $formSubmission)
    {
        return view('admin.form_submissions.edit', compact('formSubmission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormSubmission $formSubmission)
    {
        $request->validate([
            'form_type' => 'required|string|max:255',
            'data' => 'required|array',
            'is_processed' => 'nullable|boolean'
        ]);

        $formSubmission->update([
            'form_type' => $request->form_type,
            'data' => json_encode($request->data),
            'is_processed' => $request->is_processed ?? false
        ]);

        return redirect()->route('admin.form-submissions.index')
            ->with('success', 'Form submission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormSubmission $formSubmission)
    {
        $formSubmission->delete();

        return redirect()->route('admin.form-submissions.index')
            ->with('success', 'Form submission deleted successfully.');
    }
}
