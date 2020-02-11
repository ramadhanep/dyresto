@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Laporan Kategori Masakan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Laporan</a></div>
        <div class="breadcrumb-item"><a href="#">Laporan Kategori Masakan</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <a target="blank" href="{{ route('printKategoriMasakans') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kategori Masakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategoriMasakans as $res)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if(!empty($res->foto))
                                <img src="{{ asset('img_upload/kategori_masakan/'.$res->foto) }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $res->nama_masakan }}" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                                @else
                                <img src="{{ asset('img/masakan.jpg') }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $res->nama_masakan }}" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                                @endif
                            </td>
                            <td>{{ $res->kategori }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
        $('#LILPKategoriMasakan').addClass("active")
    </script>
@endsection
