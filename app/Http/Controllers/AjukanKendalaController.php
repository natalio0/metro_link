<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AjukanKendalaController extends Controller
{
    public function store(Request $request)
{
    // Custom validation logic
    $validator = Validator::make($request->all(), [
        'telepon' => 'nullable|string|max:15',
        'judul_pengaduan' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'deskripsi_pengaduan' => 'required|string',
        'alamat' => 'nullable|string',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Periksa kembali data anda');
    }

    try {
        // Handle file upload
        $fileName = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public'); // Store the file in the uploads directory inside public storage
        }

        // Create new pengaduan
        $pengaduan = new Pengaduan();
        $pengaduan->username = Auth::user()->username;
        $pengaduan->email = Auth::user()->email;
        $pengaduan->telepon = $request->telepon;
        $pengaduan->judul_pengaduan = $request->judul_pengaduan;
        $pengaduan->foto = $fileName;
        $pengaduan->deskripsi_pengaduan = $request->deskripsi_pengaduan;
        $pengaduan->alamat = $request->alamat;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Pengaduan berhasil diajukan! Keluhan anda akan segera ditindak lanjuti');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while submitting the complaint');
    }
}

}
