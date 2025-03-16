<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang']
        ];

        $page = (object) [
            'title' => 'Daftar barang yang terdaftar dalam sistem',
        ];

        $barang = Barang::all(); // Mengambil semua data kategori untuk dropdown filter
        $activeMenu = 'barang';
        $data = Barang::select('barang_id', 'kategori_id', 'barang_kode', 'harga_beli', 'harga_jual')->get();

        return view('barang.index', compact('breadcrumb', 'page', 'activeMenu', 'barang', 'data'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $query = Barang::select('barang_id', 'kategori_id', 'barang_kode', 'harga_beli', 'harga_jual');

            if ($request->barang_id) {
                $query->where('barang_id', $request->barang_id);
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('aksi', function ($barang) {
                    return '
                        <a href="'.url('/barang/'.$barang->barang_id.'/edit').'" class="btn btn-warning btn-sm">Edit</a>
                        <form action="'.url('barang/'.$barang->barang_id).'" method="POST" style="display:inline;">
                            '.csrf_field().method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus?\');">Hapus</button>
                        </form>
                        <a href="'.url('/barang/detail/'.$barang->barang_id).'" class="btn btn-info btn-sm">Detail</a>
                    ';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        
        return response()->json(['message' => 'Invalid Request'], 400);
    }
}
?>
