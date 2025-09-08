<?php

namespace App\Http\Controllers;

use App\Models\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeoMetaController extends Controller
{
    // Define model types available for SEO
    private $modelTypes = [
        'App\Models\Page' => 'Page',
        'App\Models\Post' => 'Post',
        'App\Models\Product' => 'Product',
        'App\Models\Category' => 'Category',
        // Add more models as needed
    ];

    // Index method to list all SEO metadata
    public function index()
    {
        $seoMetas = SeoMeta::with('metable')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.seo_metas.index', compact('seoMetas'));
    }

    // Show method to display specific SEO metadata
    public function show(SeoMeta $seoMeta)
    {
        $seoMeta->load('metable');
        return view('admin.seo_metas.show', compact('seoMeta'));
    }

    public function create()
    {
        $modelTypes = $this->modelTypes;
        return view('admin.seo_metas.create', compact('modelTypes'));
    }

    // Store method to save new SEO metadata
    public function store(Request $request)
    {
        $validated = $request->validate([
            'metable_type' => 'required|string',
            'metable_id' => 'required|integer',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'keywords' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Check if SEO meta already exists for this model
        $existingSeoMeta = SeoMeta::where('metable_type', $validated['metable_type'])
            ->where('metable_id', $validated['metable_id'])
            ->first();

        if ($existingSeoMeta) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'SEO metadata already exists for this model. Please edit the existing one instead.');
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            $validated['og_image'] = $request->file('og_image')->store('seo_images', 'public');
        }

        // Create the SEO meta
        SeoMeta::create($validated);

        return redirect()->route('admin.seo-metas.index')
            ->with('success', 'SEO metadata created successfully.');
    }

    public function edit(SeoMeta $seoMeta)
    {
        $model = $seoMeta->metable;
        $modelTypes = $this->modelTypes;
        return view('admin.seo_metas.edit', compact('seoMeta', 'model', 'modelTypes'));
    }

    public function update(Request $request, SeoMeta $seoMeta)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'keywords' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('og_image')) {
            // Delete old image if exists
            if ($seoMeta->og_image) {
                Storage::delete($seoMeta->og_image);
            }
            $validated['og_image'] = $request->file('og_image')->store('seo_images', 'public');
        }

        $seoMeta->update($validated);

        return redirect()->back()
            ->with('success', 'SEO metadata updated successfully.');
    }
}