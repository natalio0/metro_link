<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = Auth::user();
        $pengaduanData = Pengaduan::all();
        return view('admin_pengaduan', compact('user', 'pengaduanData' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_pengaduan' => 'required|string|max:255',
            'deskripsi_pengaduan' => 'required|string',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pengaduanData = $request->all();
        $pengaduanData['username'] = Auth::user()->username;
        $pengaduanData['email'] = Auth::user()->email;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/fotos');
            $pengaduanData['foto'] = Storage::url($path);
        }

        Pengaduan::create($pengaduanData);

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin_DetailPengaduan', compact('pengaduan'));
    }

}
