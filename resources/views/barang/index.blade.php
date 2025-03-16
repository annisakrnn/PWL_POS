@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('kategori/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Filter:</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            <option value="">Semua</option>
                        </select>
                        <small class="form-text text-muted">Level Kategori</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
            <thead>
                <tr>
                    <th>Barang ID</th>
                    <th>Kategori ID</th>
                    <th>Barang Kode</th>
                    <th>Barang Nama</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $d)
            <tr>
              <td>{{$d->barang_id}}</td>
              <td>{{$d->kategori_id}}</td>
              <td>{{$d->barang_kode}}</td>
              <td>{{$d->barang_nama}}</td>
              <td>{{$d->harga_beli}}</td>
              <td>{{$d->harga_jual}}</td>
                <td>
                  <a href="{{ url('/kategori/'.$d->kategori_id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ url('kategori/'.$d->kategori_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                </form>
                  <a href="{{ url('kategori/detail' . $d->id) }}" class="btn btn-sm btn-info">Detail</a>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
    var dataUser = $('#table_user').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('barang.list') }}",
            type: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: function (d) {
                d.kategori_id = $('#kategori_id').val();
            }
        },
        columns: [
            { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
            { data: "kategori_kode", orderable: true, searchable: true },
            { data: "kategori_nama", orderable: true, searchable: true },
            { data: "aksi", orderable: false, searchable: false }
        ]
    });

    $('#kategori_id').on('change', function() {
        dataUser.ajax.reload();
    });
});
</script>
@endpush
