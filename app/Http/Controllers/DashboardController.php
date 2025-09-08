<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\Subscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'projects' => Project::count(),
            'testimonials' => Testimonial::count(),
            'messages' => ContactMessage::where('is_read', false)->count(),
            'posts' => Post::published()->count(),
            'subscribers' => Subscriber::active()->count(),
        ];

        $recentProjects = Project::with('technologies')
            ->latest()
            ->take(5)
            ->get();

        $recentMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        $recentPosts = Post::published()
            ->latest()
            ->take(3)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentMessages', 'recentPosts'));
    }
}