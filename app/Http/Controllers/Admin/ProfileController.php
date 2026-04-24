<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:100',
            'tagline' => 'nullable|string|max:200',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
        ]);

        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }
        $profile->fill($request->all());
        $profile->save();

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Profile berhasil diupdate!');
    }
}