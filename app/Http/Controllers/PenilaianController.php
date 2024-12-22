<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'komentar' => 'required|string|max:250',
        ]);

        // Simpan komentar ke dalam database
        Penilaian::create([
            'username' => auth()->user()->username, // Ambil username dari user yang sedang login
            'email' => auth()->user()->email, // Ambil email dari user yang sedang login
            'komentar' => $request->komentar,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Komentar berhasil disimpan!');
    }

    public function komenAdmin()
    {
        $comments = Penilaian::all(); // Ambil semua data komentar dari database
        return view('index', compact('comments')); // Kirim data ke view penilaian.index
    }

    public function destroy($id)
    {
        $komentar = Penilaian::findOrFail($id);
        $komentar->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
}
