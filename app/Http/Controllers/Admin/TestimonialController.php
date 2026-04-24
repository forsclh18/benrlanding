<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;  // ← Gunakan singular
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;  // ← Tambahkan ini

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:100',
            'client_position' => 'nullable|string|max:100',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'client_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $data = $request->except('client_photo', 'image_url');

        // Upload file
        if ($request->hasFile('client_photo')) {
            $file = $request->file('client_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('testimonials', $filename, 'public');
            $data['client_photo'] = $path;
        }

        // URL gambar
        if ($request->image_url) {
            $data['client_photo'] = $request->image_url;
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'client_name' => 'required|string|max:100',
            'client_position' => 'nullable|string|max:100',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'client_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $data = $request->except('client_photo', 'image_url');

        // Upload file baru
        if ($request->hasFile('client_photo')) {
            if ($testimonial->client_photo && !filter_var($testimonial->client_photo, FILTER_VALIDATE_URL)) {
                Storage::delete('public/' . $testimonial->client_photo);
            }
            $file = $request->file('client_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('testimonials', $filename, 'public');
            $data['client_photo'] = $path;
        }

        // URL gambar
        if ($request->image_url) {
            if ($testimonial->client_photo && !filter_var($testimonial->client_photo, FILTER_VALIDATE_URL)) {
                Storage::delete('public/' . $testimonial->client_photo);
            }
            $data['client_photo'] = $request->image_url;
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimoni berhasil diupdate!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        if ($testimonial->client_photo && !filter_var($testimonial->client_photo, FILTER_VALIDATE_URL)) {
            Storage::delete('public/' . $testimonial->client_photo);
        }
        
        $testimonial->delete();

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}