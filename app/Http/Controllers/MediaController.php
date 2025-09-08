<?php

namespace App\Http\Controllers;

use Log;
use Exception;
use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::where('user_id', Auth::id())
                    ->latest()
                    ->paginate(20);
                    
        $totalSize = Media::where('user_id', Auth::id())->sum('size');
        $fileCount = Media::where('user_id', Auth::id())->count();
        
        return view('admin.media.index', compact('media', 'totalSize', 'fileCount'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|file|max:10240', // Max 10MB
            'name' => 'nullable|string|max:255'
        ]);

        $file = $request->file('file');
        
        // Generate a unique filename
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::slug($originalName) . '_' . time() . '.' . $extension;
        
        $path = $file->storeAs('media', $fileName, 'public');

        Media::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'] ?? $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize()
        ]);

        return redirect()->route('admin.media.index')
            ->with('success', 'File uploaded successfully.');
    }

    public function destroy(Media $media)
{
    // Check if the user owns this media file
    if ($media->user_id !== Auth::id()) {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }
    
    try {
        // Delete the physical file from storage
        if (Storage::disk('public')->exists($media->path)) {
            Storage::disk('public')->delete($media->path);
            
            // Optional: Delete empty parent directories
            $this->deleteEmptyDirectories(dirname($media->path));
        }
        
        // Delete the database record
        $media->delete();
        
        return redirect()->route('admin.media.index')
            ->with('success', 'File deleted successfully.');
            
    } catch (Exception $e) {
        // Log the error for debugging
        Log::error('Media deletion error: ' . $e->getMessage());
        
        return redirect()->back()
            ->with('error', 'Failed to delete file. Please try again.');
    }
}
    
    public function download(Media $media)
    {
        // Check if the user owns this media file
        if ($media->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        
        return Storage::disk('public')->download($media->path, $media->name);
    }
}