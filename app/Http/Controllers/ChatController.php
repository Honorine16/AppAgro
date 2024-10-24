<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class ChatController extends Controller
{

    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('menus.chat', compact('messages'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,doc,docx,pdf|max:2048',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        $message = Message::create([
            'name' => $request->name,
            'message' => $request->message,
            'file_path' => $filePath,
            // 'original_name' => $file->getClientOriginalName(),
        ]);

        Notification::route('mail', $request->recipientEmail)->notify(new MessageReceived($message->message));


        return redirect()->route('menus.chat');

        try {
            $message = Message::create([
                // 'name' => $request->name,
                'message' => $request->message,
                'file_path' => $filePath,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('menus.chat')->withErrors(['error' => 'Échec de l\'envoi du message.']);
        }
    }

    public function chatWithUser($userId)
    {
        $user = User::findOrFail($userId);
        $messages = Message::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        $recipientEmail = $user->email;

        return view('menus.chat', compact('messages', 'user', 'recipientEmail'));
    }

    public function showUsers()
    {
        $users = User::all();
        return view('menus.list', compact('users'));
    }

    public function showDiscussion($userId)
    {
        $user = User::findOrFail($userId);

        $messages = Message::where('user_id', $userId)->orderBy('created_at', 'asc')->get();

        return view('menus.chat', compact('user', 'messages'));
    }
}
