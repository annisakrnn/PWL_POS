<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class UserController extends Controller
{

public function index()
{
    $breadcrumb = (object) [
        'title' => 'Daftar User',
        'list' => ['Home', 'User']
    ];

    
    $page = (object) [
        'title' => 'Daftar user yang terdaftar dalam sistem',
    ];
    $activeMenu = 'user';

    $level = LevelModel::all();

    $users = UserModel::all(); // Mengambil semua data pengguna
    
    // Ambil data pengguna beserta levelnya
    $data = User::with('level')->get();

    // Debugging untuk cek apakah data ada
    if ($data->isEmpty()) {
        return view('user.index', compact('breadcrumb', 'page', 'activeMenu'))
            ->with('error', 'Tidak ada data user dalam database!');
    }

     // Debugging: Cek apakah data benar-benar ada
     //dd($data);

    return view('user.index', compact('breadcrumb', 'page', 'level', 'activeMenu', 'data'));
}


// Ambil data user dalam bentuk json untuk datatables 
public function list(Request $request) 
{ 
    $users = UserModel::select('user_id', 'username', 'nama', 'level_id') 
                ->with('level');
//Filter data user berdasarkan level_id 
if ($request->level_id){
    $users->where('level_id', $request->level_id);
}
    return DataTables::of($users) 
        // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex) 
        ->addIndexColumn()  
        ->addColumn('aksi', function ($user) {  // menambahkan kolom aksi 
            $btn  = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn
sm">Detail</a> '; 
            $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn
warning btn-sm">Edit</a> '; 
            $btn .= '<form class="d-inline-block" method="POST" action="'. 
url('/user/'.$user->user_id).'">' 
                    . csrf_field() . method_field('DELETE') .  
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return 
confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';      
            return $btn; 
        }) 
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html 
        ->make(true); 
} 
//Menambahkan data
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User','Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah user baru',
        ];
        $level = LevelModel::all(); 
        $activeMenu = 'user';
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);

        
    }
//Menyimpan data user baru
public function store(Request $request)
{
    $request->validate([
        // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
        'username' => 'required|string|min:3|unique:m_user,username',
        'nama'     => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
        'password' => 'required|min:5',          // password harus diisi dan minimal 5 karakter
        'level_id' => 'required|integer'         // level_id harus diisi dan berupa angka
    ]);

    UserModel::create([
        'username' => $request->username,
        'nama'     => $request->nama,
        'password' => bcrypt($request->password), // password dienkripsi sebelum disimpan
        'level_id' => $request->level_id
    ]);

    return redirect('/user')->with('success', 'Data user berhasil disimpan');
}

//Menampilkan Data Userpublic function show(string $id)
public function show(string $id)
{
   $user = UserModel::with('level')->where('user_id', 2)->first();
    $breadcrumb = (object) [
        'title' => 'Detail User',
        'list' => ['Home', 'User ', 'Detail']
    ];
    $level = LevelModel::all();
    $page = (object) [
        'title' => 'Detail user',
    ];
    $activeMenu = 'user'; // set menu yang sedang aktif
    return view('user.show', compact('user', 'breadcrumb', 'page', 'activeMenu'));
}

//Menampilkan halaman form edit user
public function edit(string $id)
{
    $user = UserModel::with('level')->where('user_id', $id)->first();
    $level = LevelModel::all(); // Ambil semua level untuk ditampilkan di dropdown

    $breadcrumb = (object) [
        'title' => 'Edit User',
        'list' => ['Home', 'User ', 'Edit']
    ]; 
    $page = (object) [
        'title' => 'Edit user',
    ];
    $activeMenu = 'user'; // set menu yang sedang aktif
    return view('user.edit', compact('user', 'breadcrumb', 'level', 'page', 'activeMenu'));
}

// Menyimpan perubahan data user
public function update(Request $request, string $id)
{
    $request->validate([
        'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',  // Perbaiki validasi unique
        'nama'     => 'required|string|max:100',
        'password' => 'nullable|min:5',  // Password opsional saat update
        'level_id' => 'required|integer'
    ]);

    $user = UserModel::find($id);
    
    // Update data user
    $user->update([
        'username' => $request->username,
        'nama'     => $request->nama,
        'password' => $request->password ? bcrypt($request->password) : $user->password,  // Jika password kosong, jangan diubah
        'level_id' => $request->level_id
    ]);
    return redirect('/user')->with('success', 'Data user berhasil diubah');
}
//Menghapus data user
public function destroy(string $id)
{
    $user = UserModel::find($id);
    if (!$user) {
        // Jika user tidak ditemukan, beri pesan error
        return redirect('/user')->with('error', 'Data user tidak ditemukan');
    }
    try {
        // Hapus data user
        $user->delete();  // menghapus user sesuai model
        return redirect('/user')->with('success', 'Data user berhasil dihapus');
    } catch (\Illuminate\Database\QueryException $e) {
        // Jika terjadi error saat menghapus data
        return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
    }
}

}