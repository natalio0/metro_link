<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SesiController extends Controller
{
    public function index()
    {
        return view('login'); // Tampilkan halaman login dan register
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            $user = new User();

            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return back()->with('success', 'Register successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Error code for duplicate entry
                if (strpos($e->getMessage(), 'users.username') !== false) {
                    return back()->with('error', 'Username already exists');
                } elseif (strpos($e->getMessage(), 'users.email') !== false) {
                    return back()->with('error', 'Email already exists');
                }
            }
            return back()->with('error', 'An error occurred while registering');
        }
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->tipe_user == 'admin') {
                return redirect('admin');
            } elseif (Auth::user()->tipe_user == 'user') {
                return redirect('metrolink');
            }
        } else {
            return redirect()->back()->withErrors('Username and password do not match.')->withInput();
        }
    }

    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
