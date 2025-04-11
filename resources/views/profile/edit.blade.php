@extends('layouts.template')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Edit Profil</h1>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

          <form action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="profile_photo">Foto Profil</label>
              <input type="file" name="profile_photo" id="profile_photo" class="form-control" accept="image/*">
              @error('profile_photo')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label>Foto Saat Ini</label><br>
              @if (Auth::user()->profile_photo)
                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Foto Profil" width="100" class="img-circle">
              @else
                <p>Belum ada foto profil</p>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection