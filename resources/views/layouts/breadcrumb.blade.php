<section class="content-header">
    <div class="container-fluid"> {{-- kelas bootstrap --}}
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $breadcrumb->title }}</h1> {{-- untuk data pengguna/judul--}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach($breadcrumb->list as $key => $value) {{-- untuk  perulangan Blade untuk mengiterasi setiap elemen dalam array $breadcrumb->list.--}}
                        @if($key == count($breadcrumb->list) - 1) {{--memeriksa item terakhir dalam daftar breadcrumb dan menghitung panjang aaraay -1 untuk mendapatkan indeks terakhir--}}
                            <li class="breadcrumb-item active">{{ $value }}</li> {{-- menampilkan halaman data --}}
                        @else
                            <li class="breadcrumb-item">{{ $value }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>