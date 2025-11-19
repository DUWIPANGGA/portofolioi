<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Certificate::where('user_id', Auth::id());

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('issuer', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('credential_id', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && !empty($request->status)) {
            if ($request->status === 'active') {
                $query->active();
            } elseif ($request->status === 'expired') {
                $query->where('expiry_date', '<', now());
            }
        }

        // Sorting
        $sortField = $request->get('sort', 'order');
        $sortDirection = $request->get('direction', 'asc');

        $allowedSortFields = ['title', 'issuer', 'issue_date', 'expiry_date', 'order'];
        if (!in_array($sortField, $allowedSortFields)) {
            $sortField = 'order';
        }

        $certificates = $query->orderBy($sortField, $sortDirection)
                            ->paginate(12)
                            ->withQueryString();

        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issue_date',
            'credential_id' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $certificateData = $validated;
        $certificateData['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('certificates', 'public');
            $certificateData['image'] = $imagePath;
        }

        Certificate::create($certificateData);

        return redirect()->route('admin.certificates.index')
                        ->with('success', 'Certificate created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        $this->checkOwnership($certificate);
        return view('admin.certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        $this->checkOwnership($certificate);
        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $this->checkOwnership($certificate);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issue_date',
            'credential_id' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $updateData = $validated;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }

            $imagePath = $request->file('image')->store('certificates', 'public');
            $updateData['image'] = $imagePath;
        }

        $certificate->update($updateData);

        return redirect()->route('admin.certificates.index')
                        ->with('success', 'Certificate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $this->checkOwnership($certificate);

        // Delete image if exists
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')
                        ->with('success', 'Certificate deleted successfully.');
    }

    /**
     * Update order of certificates
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'certificates' => 'required|array',
            'certificates.*.id' => 'required|exists:certificates,id',
            'certificates.*.order' => 'required|integer'
        ]);

        foreach ($request->certificates as $certificate) {
            Certificate::where('user_id', Auth::id())
                     ->where('id', $certificate['id'])
                     ->update(['order' => $certificate['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully.'
        ]);
    }

    /**
     * Toggle active status
     */
    public function toggleActive(Certificate $certificate)
    {
        $this->checkOwnership($certificate);

        $certificate->update([
            'is_active' => !$certificate->is_active
        ]);

        return redirect()->back()
                        ->with('success', 'Certificate status updated successfully.');
    }

    /**
     * Check if the certificate belongs to the current user
     */
    private function checkOwnership(Certificate $certificate)
    {
        if ($certificate->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}