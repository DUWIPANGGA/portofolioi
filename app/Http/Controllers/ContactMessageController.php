<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        // Mark as read
        if (!$contactMessage->is_read) {
            $contactMessage->update(['is_read' => true]);
        }
        
        return view('admin.contact_messages.show', compact('contactMessage'));
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact_messages.index')
            ->with('success', 'Message deleted successfully.');
    }
public function reply(ContactMessage $contactMessage)
    {
        return view('admin.contact_messages.reply', compact('contactMessage'));
    }

    public function sendReply(Request $request, ContactMessage $contactMessage)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send reply email
        try {
            Mail::to($contactMessage->email)
                ->send(new ContactReply($contactMessage, $validated['subject'], $validated['message']));
            
            return redirect()->route('admin.contact_messages.show', $contactMessage->id)
                ->with('success', 'Reply sent successfully.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Failed to send reply: ' . $e->getMessage());
        }
    }
    // Note: No create/store methods needed as messages come from frontend contact form
    // Note: No edit/update methods as we typically don't modify messages
}