@extends('layouts.template')

@section('content')
  <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
          <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
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
                        <select class="form-control" id="level_id" name="level_id">
                            <option value="">Semua</option>
                            @foreach ($level as $item)
                            <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Level Pengguna</small>
                    </div>
                </div>
            </div>
            </div>
        </div>

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
          <tbody>
            @foreach ($data as $d)
            <tr>
              <td>{{$d->user_id}}</td>
              <td>{{$d->username}}</td>
              <td>{{$d->nama}}</td>
              <td>{{$d->level_id}}</td>
                <td>
                  <a href="{{ url('/user/'.$d->user_id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ url('user/'.$d->user_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                </form>
                  <a href="{{ url('user/detail' . $d->id) }}" class="btn btn-sm btn-info">Detail</a>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
      </div>
  </div>
@endsection

@push('css')
@endpush

@push('js')
<script>
  $(document).ready(function() {
    var dataUser = $('#table_user').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ url('user/list') }}",
            type: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: function (d) {
                d.level_id = $('#level_id').val();
                d.search = $('#searchBox').val();
            }
        },
        columns: [
            { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
            { data: "username", orderable: true, searchable: true },
            { data: "nama", orderable: true, searchable: true },
            { data: "level.level_nama", orderable: false, searchable: false },
            { data: "aksi", orderable: false, searchable: false }
        ]
    });

    $('#level_id').on('change', function() {
        dataUser.ajax.reload();
    });
    
    $('#searchBox').on('keyup', function() {
        dataUser.search(this.value).draw();
    });
  });
</script>
@endpush
