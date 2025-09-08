<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->paginate(20);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        Subscriber::create($validated);

        return redirect()->back()
            ->with('success', 'Thank you for subscribing!');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber deleted successfully.');
    }

    public function toggleStatus(Subscriber $subscriber)
    {
        $subscriber->update([
            'is_active' => !$subscriber->is_active
        ]);

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber status updated successfully.');
    }
}