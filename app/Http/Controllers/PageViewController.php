<?php

namespace App\Http\Controllers;

use App\Models\PageView;
use Illuminate\Http\Request;

class PageViewController extends Controller
{
    public function index(Request $request)
    {
        $query = PageView::with('user')->latest();
        
        // Search filter
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('url', 'like', "%{$search}%")
                  ->orWhere('ip_address', 'like', "%{$search}%")
                  ->orWhere('user_agent', 'like', "%{$search}%")
                  ->orWhere('referrer', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }
        
        // URL filter
        if ($request->has('url') && !empty($request->url)) {
            $query->where('url', $request->url);
        }
        
        $pageViews = $query->paginate(50);
        $uniqueUrls = PageView::select('url')->distinct()->orderBy('url')->pluck('url');
        
        return view('admin.page_views.index', compact('pageViews', 'uniqueUrls'));
    }

    public function show(PageView $pageView)
    {
        return view('admin.page_views.show', compact('pageView'));
    }

    public function destroy(PageView $pageView)
    {
        $pageView->delete();
        
        return redirect()->route('admin.page-views.index')
            ->with('success', 'Page view record deleted successfully.');
    }
}