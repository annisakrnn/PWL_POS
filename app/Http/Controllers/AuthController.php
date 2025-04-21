<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use App\Models\LevelModel;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // Jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) { 
            $credentials = $request->only('username', 'password'); 
            if (Auth::attempt($credentials)) { 
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Logout Berhasil',
                'redirect' => url('login')
            ]);
        }
        return redirect('login')->with('message', 'Logout Berhasil');
    }

    public function register()
    {
        Auth::logout();

        // mengambil data untuk dropdown
        $levels = LevelModel::all();

        Log::info('Data Levels di AuthController', [
            'levels_count' => $levels->count(),
            'levels_data' => $levels->toArray()
        ]);

        return view('auth.register', compact('levels'));
    }

    public function postregister(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            // validasi input
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|unique:m_user,username',
                'nama' => 'required|string|max:255',
                'password' => 'required|string|min:6|confirmed',
                'level_id' => 'required|exists:m_level,level_id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ]);
            }

            // simpan user baru
            $user = UserModel::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => bcrypt($request->password),
                'level_id' => $request->level_id,
            ]);

            // login otomatis setelah registrasi
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) { 
                return response()->json([
                    'status' => true,
                    'message' => 'Registrasi dan Login Berhasil',
                    'redirect' => url('/')
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Registrasi Berhasil. Silakan login.',
                'redirect' => url('login')
            ]);
        }

        return redirect('register');
    }
}