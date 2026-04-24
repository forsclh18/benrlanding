<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class WelcomeController extends Controller
{
    public function index()
    {
        $profile = \App\Models\Profile::first();
        $services = \App\Models\Service::orderBy('created_at', 'desc')->take(6)->get();
        $portfolios = \App\Models\Portfolio::orderBy('created_at', 'desc')->take(12)->get();
        $teams = \App\Models\Team::orderBy('created_at', 'desc')->take(4)->get();
        $sliders = \App\Models\Slider::where('is_active', true)->orderBy('order')->get();
        $businessImages = \App\Models\BusinessImage::orderBy('position')->get();
        $businessContent = \App\Models\BusinessContent::first();

        return view('welcome', compact(
            'profile',
            'services',
            'portfolios',
            'teams',
            'sliders',
            'businessImages',
            'businessContent'
        ));
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:5000',
        ]);

        // Save to database
        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['message'],
            'is_read' => false,
        ]);

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
