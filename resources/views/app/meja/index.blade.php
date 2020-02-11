@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Daftar Meja</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Informasi Masakan</a></div>
        <div class="breadcrumb-item"><a href="#">Daftar Meja</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <a href="{{ route('meja.create') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-users"></i> Tambah Data</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Meja</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @include("_____FUNCTION.tglIndo")
                    @foreach($mejas as $res)
                        @php
                            $d = $res->created_at;
                            $t = $d->format('Y-m-d');
                        @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="badge badge-primary">
                                {{ $res->no_meja }}
                            </div>
                        </td>
                        <td>
                            @if(strlen($res->keterangan) > 70)
                            {!! substr($res->keterangan,0,70) !!}..
                            @else
                            {!! $res->keterangan !!}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('meja.edit', $res->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="#" data-uri="{{ route('meja.destroy', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a>
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
        $('#LIMeja').addClass("active")
    </script>
@endsection
