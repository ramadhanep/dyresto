@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Order</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
        <div class="breadcrumb-item"><a href="#">Order</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header d-flex justify-content-between">
                    <div class="d-flex">
                        <h4>Daftar Masakan</h4>
                        <div class="card-header-form" style="margin-left: 20px">
                            <form method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                <a href="" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title data-original-title="Pencarian"><i class="fas fa-search"></i></a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <a id="keranjangSee" href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title data-original-title="Lihat keranjang"><i class="fas fa-shopping-cart"></i></a>
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
                                    @if($res->status == "Tersedia")
                                    <a href="#"  __masakan_id="{{ $res->id }}" __harga="{{ $res->harga }}" class="btn btn-outline-primary btn-sm keranjangPlus" data-toggle="tooltip" data-placement="left" title data-original-title="Tambahkan ke keranjang"><i class="fas fa-cart-plus"></i> Keranjang</a>
                                    @else
                                    <a href="" onclick="event.preventDefault()" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="left" title data-original-title="Tambahkan ke keranjang"><i class="fas fa-cart-plus"></i> Keranjang</a>
                                    @endif
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
    <div id="keranjangCard" class="row @if($keranjangs->count() < 1) hide @endif">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-header d-flex justify-content-between">
                <h4>Keranjang</h4>
                <div class="d-flex">
                    @if($total_harga > 0)
                    <a href="#" data-uri="{{ route('keranjangClean') }}" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i> Bersihkan Keranjang</a>
                    &nbsp;&nbsp;&nbsp;
                    @endif
                    <a id="keranjangHide" href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title data-original-title="Sembunyikan keranjang"><i class="fas fa-times"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Masakan</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keranjangs as $res)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if(!empty($res->masakan->foto))
                                <img src="{{ asset('img_upload/masakan/'.$res->masakan->foto) }}" alt="foto" width="45" height="40" data-toggle="tooltip" data-original-title="{{ $res->masakan->name }}" style="object-fit: cover;border-radius: 5px;border: 1px solid #fff;">
                                @else
                                <img src="{{ asset('stisla/img/avatar/avatar-1.png') }}" alt="foto" width="45" height="40" data-toggle="tooltip" data-original-title="{{ $res->masakan->name }}" style="object-fit: cover;border-radius: 5px;border: 1px solid #fff;">
                                @endif
                                &nbsp;&nbsp;
                                {{ $res->masakan->nama_masakan }}
                            </td>
                            <td>{{ $res->jumlah }}</td>
                            <td>IDR {{ number_format($res->sub_total,2,',','.') }}</td>
                            <td>
                                <a href="#" data-uri="{{ route('keranjang.destroy', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="text-right" style="border-top: 1px solid #ccc; padding: 20px 0;">
                        <p class="h5">Total Harga : <b>IDR {{ number_format($total_harga,2,',','.') }}</b></p>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="">Segarkan Halaman (Refresh)</a>
                @if($total_harga > 0)
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#modalOrder"><i class="far fa-edit"></i> Order Sekarang</a>
                @endif
            </div>
        </div>
        </div>
    </div>
    </div>

    <button id="openModalKplus" data-toggle="modal" data-target="#modalKplus" style="display:none"></button>
    <div class="modal fade" id="modalKplus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="position: absolute;bottom:70px;right:70px;width: 400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jumlah (Kuantitas)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('keranjang.store') }}" class="needs-validation" novalidate="">
                    @csrf
                    <input id="masakanIdInputKplus" type="hidden" name="masakan_id">
                    <input id="hargaInputKplus" type="hidden" name="harga">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="number" class="form-control" name="jumlah" required="" placeholder="Jumlah" value="1">
                            <div class="invalid-feedback">
                                Form Jumlah harus diisi!
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('order.store') }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="summernote-simple" name="keterangan"></textarea>
                                    <div class="invalid-feedback">
                                        Form Keterangan harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Nomor Meja</label>
                                    <select class="form-control selectric" name="meja_id" required>
                                        @foreach($mejas as $res)
                                        <option value="{{ $res->id }}">{{ $res->no_meja }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Form Nomor Meja harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Order</label>
                                    <input type="text" name="tanggal" class="form-control datepicker" disabled>
                                    <div class="invalid-feedback">
                                        Form Tanggal Order harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
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
    <script src="{{ asset('stisla/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('stisla/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endsection
@section("scriptSpesific")
    <script src="{{ asset('stisla/js/page/modules-datatables.js') }}"></script>
@endsection
@section("scriptCustom")
    @include("layouts.components.toastSession")
    <script>
        $('#LIOrder').addClass('active');
        $('.select2').select2()

        $('#keranjangSee').click(function(e){
            e.preventDefault()
            $('#keranjangCard').slideDown("slow")
            setTimeout(function(){
                $('html, body').animate({
                    scrollTop: $("#keranjangCard").offset().top
                }, 1000);
            }, 500)
        })
        $('#keranjangHide').click(function(e){
            e.preventDefault()
            $('#keranjangCard').slideUp("slow")
        })

        $('.keranjangPlus').click(function(e){
            e.preventDefault()

            let __masakan_id = $(this).attr("__masakan_id")
            let __harga = $(this).attr("__harga")

            $("#masakanIdInputKplus").val(__masakan_id)
            $("#hargaInputKplus").val(__harga)

            $("#openModalKplus").click()
        })
    </script>
    <script src="{{ asset('stisla/js/page/features-post-create.js') }}"></script>
@endsection
