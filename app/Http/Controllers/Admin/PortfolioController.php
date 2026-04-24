<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'category' => 'nullable|string|max:100',
            'description' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $data = $request->except('image_file', 'image_url');
        
        // Handle upload file
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('portfolios', $filename, 'public');
            $data['image'] = $path;
        }
        
        // Handle URL gambar
        if ($request->image_url) {
            $data['image'] = $request->image_url;
        }

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'category' => 'nullable|string|max:100',
            'description' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $data = $request->except('image_file', 'image_url');
        
        // Handle upload file baru
        if ($request->hasFile('image_file')) {
            // Hapus gambar lama
            if ($portfolio->image && !filter_var($portfolio->image, FILTER_VALIDATE_URL)) {
                Storage::delete('public/' . $portfolio->image);
            }
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('portfolios', $filename, 'public');
            $data['image'] = $path;
        }
        
        // Handle URL gambar
        if ($request->image_url) {
            // Hapus file lama jika ada
            if ($portfolio->image && !filter_var($portfolio->image, FILTER_VALIDATE_URL)) {
                Storage::delete('public/' . $portfolio->image);
            }
            $data['image'] = $request->image_url;
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil diupdate!');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Hapus file gambar jika bukan URL
        if ($portfolio->image && !filter_var($portfolio->image, FILTER_VALIDATE_URL)) {
            Storage::delete('public/' . $portfolio->image);
        }
        
        $portfolio->delete();
        
        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil dihapus!');
    }
}