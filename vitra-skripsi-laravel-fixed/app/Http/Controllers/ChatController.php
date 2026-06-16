<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Daftar user yang bisa diajak chat.
     */
    public function index()
    {
        $auth = auth()->user();

        if ($auth->isMahasiswa()) {
            $users = User::where('id', '!=', $auth->id)
                ->where('role', 'dosen')
                ->get();
        } elseif ($auth->isDosen()) {
            $users = User::where('id', '!=', $auth->id)
                ->where('role', 'mahasiswa')
                ->get();
        } else {
            $users = collect();
        }

        return view('chats.index', compact('users'));
    }

    /**
     * Halaman chat dengan user tertentu.
     */
    public function show(User $user)
    {
        $auth = auth()->user();

        if (! $this->canChatWith($auth, $user)) {
            abort(403, 'Anda tidak memiliki akses untuk chat dengan user ini.');
        }

        $messages = Message::where(function ($query) use ($auth, $user) {
                $query->where('sender_id', $auth->id)
                      ->where('receiver_id', $user->id);
            })
            ->orWhere(function ($query) use ($auth, $user) {
                $query->where('sender_id', $user->id)
                      ->where('receiver_id', $auth->id);
            })
            ->orderBy('created_at')
            ->get();

        Message::where('sender_id', $user->id)
            ->where('receiver_id', $auth->id)
            ->whereNull('read_at')
            ->update([
                'read_at' => now(),
            ]);

        return view('chats.show', [
            'receiver' => $user,
            'messages' => $messages,
        ]);
    }

    /**
     * Kirim pesan.
     */
    public function store(Request $request, User $user)
    {
        $auth = auth()->user();

        if (! $this->canChatWith($auth, $user)) {
            abort(403, 'Anda tidak memiliki akses untuk mengirim pesan.');
        }

        $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        Message::create([
            'sender_id' => $auth->id,
            'receiver_id' => $user->id,
            'message' => $request->message,
        ]);

        return redirect()
            ->route('chats.show', $user)
            ->with('success', 'Pesan berhasil dikirim.');
    }

    /**
     * Hak akses chat.
     */
    private function canChatWith(User $auth, User $user): bool
    {
        if ($auth->id === $user->id) {
            return false;
        }

        if ($auth->isMahasiswa() && $user->isDosen()) {
            return true;
        }

        if ($auth->isDosen() && $user->isMahasiswa()) {
            return true;
        }

        return false;
    }
}