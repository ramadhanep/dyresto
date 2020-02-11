@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Kategori Masakan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Informasi Masakan</a></div>
        <div class="breadcrumb-item"><a href="#">Kategori Masakan</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <a href="{{ route('kategoriMasakan.create') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-users"></i> Tambah Data</a>
                &nbsp;
                &nbsp;
                <a target="blank" href="{{ route('printKategoriMasakans') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-print"></i> Cetak</a>
                <div class="card-header-form" style="margin-left: 20px">
                    <form method="GET">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="q">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                @if(!empty($q))
                Menampilkan Hasil Pencarian <b>"{{ $q }}"</b>
                @endif
                <div class="row mt-3">
                @foreach ($kategoriMasakans as $res)
                    <div class="col-6 col-md-3 mb-5">
                        <div class="category-list">
                            <div class="mb-2" title="{{ $res->kategori }}">
                                <span class="badge badge-primary text-uppercase cat-foto">
                                    @if(strlen($res->kategori) > 25)
                                    {{ substr($res->kategori,0,25) }}..
                                    @else
                                    {{ $res->kategori }}
                                    @endif
                                </span>
                            </div>
                            <div class="wrapper-cat-list">
                                <img class="img-fluid img-cat" src="{{ asset('img_upload/kategori_masakan/'.$res->foto) }}" alt="{{ $res->kategori }}">
                                <div class="action-cat">
                                    <a href="{{ route('kategoriMasakan.edit', $res->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    &nbsp;
                                    <a href="#" data-uri="{{ route('kategoriMasakan.destroy', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCModal"><i class="fas fa-trash-alt"></i> Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="d-flex justify-content-end">
                    {{ $kategoriMasakans->links() }}
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@include("layouts.components.toastSession")
@endsection
@section("scriptLibraies")
    <script src="{{ asset('stisla/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/izitoast/js/iziToast.min.js') }}"></script>
@endsection
@section("scriptSpesific")
    <script src="{{ asset('stisla/js/page/modules-datatables.js') }}"></script>
@endsection
@section("scriptCustom")
    @include("layouts.components.toastSession")
    <script>
        $('#LIKategoriMasakan').addClass("active")
    </script>
@endsection
