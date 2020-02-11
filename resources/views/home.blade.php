@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="col-12 mb-4">
                    <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('stisla/img/unsplash/andre-benz-1214056-unsplash.jpg');">
                        <div class="hero-inner">
                        <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
                        <p class="lead">Hak Akses {{ Auth::user()->level->level }} telah diberikan kepada akun Anda!. Selamat Menggunakan Aplikasi!</p>
                        <div class="mt-4">
                            <a href="{{ route('profile') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Profil Akun</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("scriptLibraies")
    <script src="{{ asset('stisla/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/chart.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('stisla/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/izitoast/js/iziToast.min.js') }}"></script>
@endsection

@section("scriptSpesific")
@endsection
@section("scriptCustom")
    @if(session()->has('success'))
        <script>
            iziToast.info({
                title: '{{ Auth::user()->level->level }} Hak Akses Anda!',
                message: "Selamat Menggunakan Aplikasi",
                position: 'topRight'
            });
            iziToast.success({
                title: 'Selamat Datang di Dyresto!',
                message: "{{ Auth::user()->name }}",
                position: 'topRight'
            });
        </script>
    @endif
@endsection
