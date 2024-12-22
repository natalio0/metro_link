<?php

namespace App\Http\Controllers;


use App\Models\agenda_kota;
use App\Models\Pengaduan;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function index(){
        echo "Admin";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }

    function admin(){
        return view("dashboardAdmin");
    }

    public function count()
    {
        $totalPengaduan = Pengaduan::count();
        $totalKomentar = Penilaian::count();
        $totalAgendaTersedia =  agenda_kota::count();
        $totalAdminAkun = User::where('tipe_user', 'admin')->count();
        $totalUserAkun = User::where('tipe_user', 'user')->count();

        return view('dashboardAdmin', compact( 'totalPengaduan','totalKomentar','totalAgendaTersedia','totalAdminAkun','totalUserAkun' ));
    }

    // CRUD AKUN DI ADMIN =================================================================================================================

    function akun_admin(){
        $users = User::all();
        return view('akun_admin', compact('users'));
    }

    function Admin_createAkun(){
        return view('Create_adminAkun');
    }

    public function Admin_storeAkun(Request $request)
    {
    // Custom validation logic
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        $messages = $validator->messages();
        if ($messages->has('username')) {
            $error = 'Username telah digunakan.';
        } elseif ($messages->has('email')) {
            $error = 'Email telah digunakan.';
        } else {
            $error = 'Periksa kembali data anda';
        }
        return redirect()->back()->withErrors($validator)->withInput()->with('error', $error);
    }

    try {
        // Create new user
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/admin/akun_admin')->with('success', 'Register successfully');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->back()->with('error', 'An error occurred while registering');
    }
}

    
    public function admin_editAkun($id)
    {
        $user = User::find($id);
        return view('edit_akunAdmin', compact('user'));
    }

    public function admin_updateAkun(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'tipe_user' => 'required|string|max:255',
        ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->tipe_user = $request->tipe_user;
        $user->save();

        return redirect('/admin/akun_admin')->with('success', 'User updated successfully');
    }

    public function akun_destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('/admin')->with('success', 'User deleted successfully');
        } else {
            return redirect('/admin')->with('error', 'User not found');
        }
    }

    // ============================================================================================================================================

    function AdminAgendakota(){
        $agendaKotas = agenda_kota::all();
        return view('admin_agendaKota', compact('agendaKotas'));
    }

    public function updateStatus(Request $request, $id)
    {
        $agendaKota = agenda_kota::findOrFail($id);
        $agendaKota->status = $request->status;
        $agendaKota->save();

        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }

    function user(){
        return view("index");
    }

    function about_us(){
        return view("about_us");
    }

    function service(){
        return view("service");
    }

    function galery(){
        return view("galery");
    }

    public function tampilkanAgenda(){
        $agendaKotas = agenda_kota::where('status', 'acc')->get();
        return view('agenda_kota', compact('agendaKotas'));
    }

    public function createAgenda(){
        return view('create_agendaKota');
    }

    public function storeAgenda(Request $request)
    {
        // Custom validation logic
        $validator = Validator::make($request->all(), [
            'nama_penyelenggara' => 'required|string|max:255',
            'nama_event' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi_event' => 'required|string',
            'tanggal_pelaksanaan' => 'required|date',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            $messages = $validator->messages();
            if ($messages->has('nama_penyelenggara')) {
                $error = 'Nama penyelenggara harus diisi.';
            } elseif ($messages->has('nama_event')) {
                $error = 'Nama event harus diisi.';
            } elseif ($messages->has('kategori')) {
                $error = 'Kategori harus diisi.';
            } elseif ($messages->has('deskripsi_event')) {
                $error = 'Deskripsi event harus diisi.';
            } elseif ($messages->has('tanggal_pelaksanaan')) {
                $error = 'Tanggal pelaksanaan harus diisi.';
            } else {
                $error = 'Periksa kembali data anda';
            }
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $error);
        }

        try {
            // Create new agenda kota
            $agendaKota = new agenda_kota();
            $agendaKota->nama_penyelenggara = $request->nama_penyelenggara;
            $agendaKota->nama_event = $request->nama_event;
            $agendaKota->kategori = $request->kategori;
            $agendaKota->deskripsi_event = $request->deskripsi_event;
            $agendaKota->tanggal_pelaksanaan = $request->tanggal_pelaksanaan;
            $agendaKota->status = 'pending'; // Set default status to pending
            $agendaKota->created_at = NULL;
            $agendaKota->save();

            return redirect()->back()->with('success', 'Event berhasil diajukan! Event akan segera diproses oleh admin 3x24 jam');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'An error occurred while submitting the event');
        }
    }


    public function formPengaduan(){
        return view('form_pengaduan');
    }

    public function formPenilaian(){
        return view('penilaian');
    }

    public function peta_bencana(){
        return view('petaBencana');
    }

    public function AdminKomentar(){
        $comments = Penilaian::all(); // Ambil semua data komentar dari database
        return view('admin_komentar', compact('comments')); // Kirim data ke view penilaian.index
    }

}
