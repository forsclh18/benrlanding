<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        // Ganti 'position' menjadi 'order'
        $sliders = Slider::orderBy('order', 'asc')->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'subtitle' => 'required|string|max:200',
            'text' => 'nullable|string',
            'btn_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/sliders'), $imageName);
            $data['image'] = 'uploads/sliders/' . $imageName;
        }

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider ditambahkan!');
    }

    public function show(Slider $slider)
    {
        //
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'subtitle' => 'required|string|max:200',
            'text' => 'nullable|string',
            'btn_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/sliders'), $imageName);
            $data['image'] = 'uploads/sliders/' . $imageName;
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider diupdate!');
    }

    public function destroy(Slider $slider)
    {
        // Hapus gambar
        if ($slider->image && file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider dihapus!');
    }
}
