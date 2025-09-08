<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'is_published' => 'boolean',
            'reading_time' => 'nullable|integer|min:1',
            'tags' => 'nullable|string',
        ]);
$validated['user_id'] = Auth::user()->id;
        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle tags (convert from comma-separated to array)
        if ($request->has('tags')) {
            $validated['tags'] = explode(',', $request->tags);
        }

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts');
        }

        // Set published_at if published
        if ($request->boolean('is_published') && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,'.$post->id,
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'is_published' => 'boolean',
            'reading_time' => 'nullable|integer|min:1',
            'tags' => 'nullable|string',
        ]);

        // Handle tags (convert from comma-separated to array)
        if ($request->has('tags')) {
            $validated['tags'] = explode(',', $request->tags);
        }

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($post->featured_image) {
                Storage::delete($post->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('posts');
        }

        // Set published_at if being published now
        if ($request->boolean('is_published') && empty($post->published_at)) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Delete featured image if exists
        if ($post->featured_image) {
            Storage::delete($post->featured_image);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}