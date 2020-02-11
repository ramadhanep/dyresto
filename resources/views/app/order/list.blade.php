@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Transaksi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
        <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Nomor Meja</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @include("_____FUNCTION.tglIndo")
                    @foreach($orders as $res)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($res->user->level->level == "Pelanggan")
                            <i class="fas fa-star" style="color: #ffa426"></i> {{ $res->user->name }}
                            @else
                            <i class="fas fa-star"></i> {{ $res->user->name }}
                            @endif
                        </td>
                        <td>
                            <div class="badge badge-primary">
                                {{ $res->meja->no_meja }}
                            </div>
                        </td>
                        <td>{{ tgl_indo($res->tanggal) }}</td>
                        <td>
                            @if(strlen($res->keterangan) > 70)
                            {!! substr($res->keterangan,0,70) !!}..
                            @else
                            {!! $res->keterangan !!}
                            @endif
                        </td>
                        <td>
                            @if(Auth::user()->level->level == "Waiter" || Auth::user()->level->level == "Pelanggan")
                            <a href="{{ route('order.show', $res->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> Selengkapnya</a>
                            @else
                            <a href="{{ route('order.show', $res->id) }}" class="btn btn-success btn-sm"><i class="fas fa-money-bill"></i> Pembayaran</a>
                            @endif
                        </td>
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
        $('#LITransaksi').addClass("active")
    </script>
@endsection
