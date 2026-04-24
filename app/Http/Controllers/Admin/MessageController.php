<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('admin.message.index', compact('messages'));
    }

    // Tambahkan method show() ini
    public function show($id)
    {
        $message = Message::findOrFail($id);
        
        // Tandai sebagai sudah dibaca jika belum
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        
        return view('admin.message.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }
}