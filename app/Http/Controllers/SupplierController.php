<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];

        $data = Supplier::select('supplier_id', 'supplier_kode', 'supplier_nama', 'kontak', 'alamat')->get();
        
        // Hapus dump data
        // dd($data);

        $page = (object) [
            'title' => 'Daftar supplier yang terdaftar dalam sistem',
        ];
        $activeMenu = 'supplier';

        return view('supplier.index', compact('breadcrumb', 'page', 'activeMenu', 'data'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $query = Supplier::select('supplier_id', 'supplier_kode', 'supplier_nama', 'kontak', 'alamat');

            if ($request->supplier_id) {
                $query->where('supplier_id', $request->supplier_id);
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('aksi', function ($supplier) {
                    return '
                        <a href="'.url('/supplier/'.$supplier->supplier_id.'/edit').'" class="btn btn-warning btn-sm">Edit</a>
                        <form action="'.url('supplier/'.$supplier->supplier_id).'" method="POST" style="display:inline;">
                            '.csrf_field().method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus?\');">Hapus</button>
                        </form>
                        <a href="'.url('/supplier/detail/'.$supplier->supplier_id).'" class="btn btn-info btn-sm">Detail</a>
                    ';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        
        return response()->json(['message' => 'Invalid Request'], 400);
    }
}
