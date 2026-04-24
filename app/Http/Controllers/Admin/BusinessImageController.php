<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessImageController extends Controller
{
    public function index()
    {
        $images = BusinessImage::orderBy('position')->get();
        return view('admin.business-images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.business-images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
            'alt_text' => 'nullable|string|max:100',
            'position' => 'nullable|integer',
        ]);

        $businessImage = new BusinessImage();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('business-images', $filename, 'public');
            $businessImage->image = $path;
        }
        
        if ($request->image_url) {
            $businessImage->image_url = $request->image_url;
        }
        
        $businessImage->alt_text = $request->alt_text;
        $businessImage->position = $request->position ?? BusinessImage::count() + 1;
        $businessImage->save();

        return redirect()->route('admin.business-images.index')
            ->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $image = BusinessImage::findOrFail($id);
        return view('admin.business-images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $businessImage = BusinessImage::findOrFail($id);
        
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
            'alt_text' => 'nullable|string|max:100',
            'position' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($businessImage->image) {
                Storage::delete('public/' . $businessImage->image);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('business-images', $filename, 'public');
            $businessImage->image = $path;
            $businessImage->image_url = null;
        }
        
        if ($request->image_url) {
            $businessImage->image_url = $request->image_url;
            if ($businessImage->image) {
                Storage::delete('public/' . $businessImage->image);
                $businessImage->image = null;
            }
        }
        
        $businessImage->alt_text = $request->alt_text;
        $businessImage->position = $request->position;
        $businessImage->save();

        return redirect()->route('admin.business-images.index')
            ->with('success', 'Gambar berhasil diupdate!');
    }

    public function destroy($id)
    {
        $image = BusinessImage::findOrFail($id);
        
        if ($image->image) {
            Storage::delete('public/' . $image->image);
        }
        
        $image->delete();

        return redirect()->route('admin.business-images.index')
            ->with('success', 'Gambar berhasil dihapus!');
    }
}