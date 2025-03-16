<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem',
        ];
        $level = Level::all(); 
        $activeMenu = 'level';
        $data = Level::select('level_id', 'level_kode', 'level_nama')->get();

        return view('level.index', compact('breadcrumb', 'page', 'activeMenu', 'level', 'data'));
    }

    public function list(Request $request)
{
    if ($request->ajax()) {
        $query = Level::select('level_id', 'level_kode', 'level_nama');

        if ($request->level_id) {
            $query->where('level_id', $request->level_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                return '
                    <a href="'.url('/level/'.$level->level_id.'/edit').'" class="btn btn-warning btn-sm">Edit</a>
                    <form action="'.url('level/'.$level->level_id).'" method="POST" style="display:inline;">
                        '.csrf_field().method_field("DELETE").'
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus?\');">Hapus</button>
                    </form>
                    <a href="'.url('/level/detail/'.$level->level_id).'" class="btn btn-info btn-sm">Detail</a>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    
    return response()->json(['message' => 'Invalid Request'], 400);
}

}
