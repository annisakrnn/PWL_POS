<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function updatePhoto(Request $request)
    {
        // validasi file yang diunggah
        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // maksimal 2MB
        ]);

        $user = Auth::user();

        // proses unggahan file
        if ($request->hasFile('profile_photo')) {
            // hapus foto lama jika ada
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // simpan foto baru
            $path = $request->file('profile_photo')->store('profile_photos', 'public');

            // perbarui kolom profile_photo
            $user->profile_photo = $path;
            $user->save();

            return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Tidak ada foto yang diunggah.');
    }
}