<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Achievement::where('user_id', Auth::id());

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('organizer', 'like', "%{$search}%")
                  ->orWhere('result', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $request->status === 'active' ? $query->active() : $query->where('is_active', false);
        }

        $sortField = in_array($request->get('sort'), ['title', 'organizer', 'event_date', 'order', 'result', 'category'])
            ? $request->get('sort') : 'order';
        $sortDirection = $request->get('direction') === 'desc' ? 'desc' : 'asc';

        $achievements = $query->orderBy($sortField, $sortDirection)
            ->paginate(12)
            ->withQueryString();

        $categoryCounts = [
            'all' => Achievement::where('user_id', Auth::id())->count(),
            'speaker' => Achievement::where('user_id', Auth::id())->where('category', 'speaker')->count(),
            'competition' => Achievement::where('user_id', Auth::id())->where('category', 'competition')->count(),
            'certification' => Achievement::where('user_id', Auth::id())->where('category', 'certification')->count(),
            'award' => Achievement::where('user_id', Auth::id())->where('category', 'award')->count(),
        ];

        return view('admin.achievements.index', compact('achievements', 'categoryCounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|in:competition,speaker,certification,award,other',
            'title' => 'required|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'result' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'certificate_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'photos' => 'nullable|array|max:10',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable'
        ]);

        $data = $validated;
        $data['user_id'] = Auth::id();
        $data['is_active'] = $request->has('is_active') ? (bool)$request->is_active : true;
        $data['order'] = $request->input('order', 0) ?? 0;
        unset($data['photos']); // di-set manual di bawah sebagai array path

        if ($request->hasFile('certificate_image')) {
            $data['certificate_image'] = $request->file('certificate_image')->store('achievements/certificates', 'public');
        }

        $paths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $paths[] = $file->store('achievements/photos', 'public');
            }
        }
        $data['photos'] = count($paths) ? $paths : null;

        Achievement::create($data);

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        $this->checkOwnership($achievement);
        return view('admin.achievements.show', compact('achievement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        $this->checkOwnership($achievement);
        return view('admin.achievements.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        $this->checkOwnership($achievement);

        $validated = $request->validate([
            'category' => 'required|string|in:competition,speaker,certification,award,other',
            'title' => 'required|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'result' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'certificate_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'photos' => 'nullable|array|max:10',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'remove_photos' => 'nullable|array',
            'remove_photos.*' => 'string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable'
        ]);

        $data = $validated;
        $data['is_active'] = $request->has('is_active') ? (bool)$request->is_active : true;
        $data['order'] = $request->input('order', 0) ?? 0;
        unset($data['remove_photos']);

        if ($request->hasFile('certificate_image')) {
            if ($achievement->certificate_image) {
                Storage::disk('public')->delete($achievement->certificate_image);
            }
            $data['certificate_image'] = $request->file('certificate_image')->store('achievements/certificates', 'public');
        }

        // Gabung foto lama (yang tidak dihapus) + foto baru
        $existingPhotos = $achievement->photos ?? [];
        $removePhotos = $request->input('remove_photos', []);

        foreach ($removePhotos as $path) {
            if (in_array($path, $existingPhotos)) {
                Storage::disk('public')->delete($path);
            }
        }
        $keptPhotos = array_values(array_diff($existingPhotos, $removePhotos));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $keptPhotos[] = $file->store('achievements/photos', 'public');
            }
        }

        $data['photos'] = count($keptPhotos) ? $keptPhotos : null;

        $achievement->update($data);

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        $this->checkOwnership($achievement);

        if ($achievement->certificate_image) {
            Storage::disk('public')->delete($achievement->certificate_image);
        }
        foreach ($achievement->photos ?? [] as $photo) {
            Storage::disk('public')->delete($photo);
        }

        $achievement->delete();

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement deleted successfully.');
    }

    /**
     * Toggle the active status of the specified achievement.
     */
    public function toggleActive(Achievement $achievement)
    {
        $this->checkOwnership($achievement);
        $achievement->update(['is_active' => !$achievement->is_active]);

        return back()->with('success', 'Status achievement berhasil diperbarui.');
    }

    /**
     * Prevent accessing other users' achievements.
     */
    private function checkOwnership(Achievement $achievement): void
    {
        if ($achievement->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
