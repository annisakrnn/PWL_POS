<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar kategori yang terdaftar dalam sistem',
        ];

        $kategori = Kategori::all(); // Mengambil semua data kategori untuk dropdown filter
        $activeMenu = 'kategori';
        $data = Kategori::select('kategori_id', 'kategori_kode', 'kategori_nama')->get();

        return view('kategori.index', compact('breadcrumb', 'page', 'activeMenu', 'kategori', 'data'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $query = Kategori::select('kategori_id', 'kategori_kode', 'kategori_nama');

            if ($request->kategori_id) {
                $query->where('kategori_id', $request->kategori_id);
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('aksi', function ($kategori) {
                    return '
                        <a href="'.url('/kategori/'.$kategori->kategori_id.'/edit').'" class="btn btn-warning btn-sm">Edit</a>
                        <form action="'.url('kategori/'.$kategori->kategori_id).'" method="POST" style="display:inline;">
                            '.csrf_field().method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus?\');">Hapus</button>
                        </form>
                        <a href="'.url('/kategori/detail/'.$kategori->kategori_id).'" class="btn btn-info btn-sm">Detail</a>
                    ';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        
        return response()->json(['message' => 'Invalid Request'], 400);
    }
}
?>
