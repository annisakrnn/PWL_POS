<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        // //tambah data user dengan eloquent model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); //tambahkan data ke tabel m_user

        // //Mengakses model UserModel
        // $user = UserModel::all(); //ambil semua data dari tabel m_user
        // return view('user', ['data' =>$user]);

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username','customer-1')->update($data); //update data ke tabel m_user

        // //Mengakses model UserModel
        // $user = UserModel::all(); //ambil semua data dari tabel m_user
        // return view('user', ['data' =>$user]);

        //jobsheet 3
        //langkah 2 praktikum 1
        // $data = [
        //     'level_id' =>2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);
        // $user = UserModel::all();
        // return view('user',['data' => $user]);

        //langkah 1 praktikum 2.1
        // $user = UserModel::find(1);
        // return view('user', ['data' => $user]);

        //langkah 4 praktikum 2.1
        // $user = UserModel::where('level_id', 1)->first();
        // return view('user', ['data' => $user]);

        //langkah 5 praktikum 2.1
        // $user = UserModel::firstWhere('level_id', 1);
        // return view('user', ['data' => $user]);
        
        //langkah 8 praktikum 2.1
        // $user = UserModel::findOr(1, ['username', 'nama'], function () {
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);

         //langkah 10 praktikum 2.1
        // $user = UserModel::findOr(20, ['username', 'nama'], function () {
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);

        //langkah 1 praktikum 2.2
        // $user = UserModel::findOrFail(1);
        // return view('user', ['data' => $user]);

        //langkah 3 praktikum 2.2
        // $user = UserModel::where('username', 'manager9')->firstOrFail();
        // return view('user', ['data' => $user]);

        //langkah 1 praktikum 2.3
        // $user = UserModel::where('level_id', 2)->count();
        //     dd($user);
        // return view('user', ['data' => $user]);

        //langkah 1 praktikum 2.4
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager'
        //     ],
        // );
        // return view('user', ['data' => $user]);
        
        //langkah 4 praktikum 2.4
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // return view('user', ['data' => $user]);

        //langkah 6 praktikum 2.4
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager'
        //     ],
        // );
        // return view('user', ['data' => $user]);

        // //langkah 8 praktikum 2.4
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // return view('user', ['data' => $user]);

        // //langkah 9 praktikum 2.4
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();
        // return view('user', ['data' => $user]);

        //langkah 1 praktikum 2.5
        // $user = UserModel::create([
        //     'username' => 'manager55',
        //     'nama' => 'Manager55',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ]);
        // $user->username = 'manager56';

        // $user->isDirty(); //true
        // $user->isDirty('username'); //true
        // $user->isDirty('nama'); //false
        // $user->isDirty(['nama', 'username']); //true

        // $user->isClean(); //false
        // $user->isClean('username'); //false
        // $user->isClean('nama'); //true
        // $user->isClean(['nama', 'username']); //false

        // $user->save();

        // $user->isDirty(); //false
        // $user->isClean(); //true
        // dd($user->isDirty());

        //langkah 2 praktikum 2.5
        // $user = UserModel::create([
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ]);
        // $user->username = 'manager12';
        // $user->save();

        // $user->wasChanged(); //true
        // $user->wasChanged('username'); //true
        // $user->wasChanged(['username', 'level_id']); //true
        // $user->wasChanged('nama'); //false
        // dd($user->wasChanged(['nama', 'username']));//true

    //     //langkah 1 dan 2 praktikum 2.6
    //     $user = UserModel::all();
    //     return view('user', ['data' => $user]);
    // }
    // public function tambah() {
    //     return view('user_tambah');
    // }
    //  //langkah 8 dan 9 praktikum 2.6
    // public function tambah_simpan(Request $request) {
    //     UserModel::create([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make('$request->password'),
    //         'level_id' => $request->level_id
    //     ]);
    //     return redirect('/user');
    // }
    // //langkah 11 dan 13 praktikum 2.6
    // public function ubah($id){
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data' =>$user]);
    // }
    // //langkah 15 dan 16 praktikum 2.6
    // public function ubah_simpan($id, Request $request){
    //     $user = UserModel::find($id);
    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->password = Hash::make('$request->password');
    //     $user->level_id = $request->level_id;
    //     $user->save();
    //     return redirect('/user');
    // }
    // //langkah 18 dan 19 praktikum 2.6
    // public function hapus($id){
    //     $user = UserModel::find($id);
    //     $user->delete();
    //     return redirect('/user');
    //langkah 1 praktikum 2.7
        $user = UserModel::with('level')->get();
        //dd($user);
         //langkah 4 dan 5 praktikum 2.7
        return view('user', ['data' =>$user]);
    }
    
}
