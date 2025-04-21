@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3> 
            <div class="card-tools">
                    <button onclick="modalAction('{{ url('/user/import') }}')" class="btn btn-info">Import User</button>
                    {{-- <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a> --}}
                    <a href="{{ url('/user/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Excel</a>
                    <a href="{{ url('/user/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export PDF</a> 
                    <button onclick="modalAction('{{ url('user/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" id="level_id" name="level_id">
                                <option value="">- Semua -</option>
                                @foreach($level as $item)
                                    <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Level Pengguna</small>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('success'))  {{--alert untuk pesan sukses atau gagal saat menaambah, dll --}}
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_user"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
    {{-- modal aksi ajax --}}
@endsection

@push('js')
    <script>
        function modalAction(url = '') { //untuk memuat konten dari url modak dan menampilkan dengan jquery
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var dataUser; //DataTable
        $(document).ready(function () { 
            dataUser = $('#table_user').DataTable({ //mengubah tabel HTML menjadi tabel interaktif dengan fitur seperti paginasi, pencarian, dan pengurutan.
                serverSide: true, //serverSide: true jika ingin menggunakan server side processing
                ajax: {
                    url: "{{ url('user/list') }}",
                    dataType: "json",
                    type: "GET",
                    data: function(d) { //Menambahkan parameter level_id (nilai dari dropdown filter) ke permintaan AJAX, sehingga tabel hanya menampilkan pengguna dengan level tertentu.
                        d.level_id = $('#level_id').val(); 
                    }
                },
                columns: [
                    { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false }, //nomor urut baris
                    { data: "username", className: "", orderable: true, searchable: true },
                    { data: "nama", className: "", orderable: true, searchable: true },
                    { data: "level.level_nama", className: "", orderable: false, searchable: false },
                    { data: "aksi", className: "", orderable: false, searchable: false }
                    //orderable true untuk komom ini bisa diurutkan
                    //searchable true jika ingin kolom bisa dicari
                ]
            });

            $('#level_id').on('change', function() { //untuk filter
                dataUser.ajax.reload();
            });
        });
    </script>
@endpush