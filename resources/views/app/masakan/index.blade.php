@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Masakan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Informasi Masakan</a></div>
        <div class="breadcrumb-item"><a href="#">Masakan</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <a href="{{ route('masakan.create') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-users"></i> Tambah Data</a>
                &nbsp;
                &nbsp;
                <a target="blank" href="{{ route('printMasakans') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-print"></i> Cetak</a>
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
                    @foreach($masakans as $res)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article article-style-b">
                          <div class="article-header">
                            @if(!empty($res->foto))
                            <div class="article-image" data-background="{{ asset('img_upload/masakan/'.$res->foto) }}" style="background-image: url(&quot;{{ asset('img_upload/masakan/'.$res->foto) }}&quot;);">
                            </div>
                            @else
                            <div class="article-image" data-background="{{ asset('img/masakan.jpg') }}" style="background-image: url(&quot;{{ asset('img/masakan.jpg') }}&quot;);">
                            </div>
                            @endif
                            <div class="article-badge">
                              <div class="article-badge-item @if($res->status == "Tersedia") bg-success @else bg-danger @endif"><i class="fas fa-fire"></i> {{ $res->status }}</div>
                            </div>
                          </div>
                          <div class="article-details">
                            <div class="article-title">
                              <h2>
                                    <a href="#">
                                        @if(strlen($res->nama_masakan) > 25)
                                        {{ substr($res->nama_masakan,0,25) }}..
                                        @else
                                        {{ $res->nama_masakan }}
                                        @endif
                                    </a>
                                </h2>
                            </div>
                            <p>Kategori : {{ $res->kategoriMasakan->kategori }}</p>
                            <div class="badge badge-primary">
                                IDR {{ number_format($res->harga,2,',','.') }}
                            </div>
                            <div class="article-cta mt-3">
                                <a href="{{ route('masakan.edit', $res->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>&nbsp;
                                <a href="#" data-uri="{{ route('masakan.destroy', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i> Hapus</a>

                                <form id="keranjangStore{{$loop->iteration}}" method="POST" action="{{ route('keranjang.store') }}" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="masakan_id" value="{{ $res->id }}">
                                    <input type="hidden" name="harga" value="{{ $res->harga }}">
                                </form>
                            </div>
                        </div>
                        </article>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end">
                    {{ $masakans->links() }}
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
        $('#LIMasakan').addClass("active")
    </script>
@endsection
