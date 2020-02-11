@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Kategori Masakan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Informasi Masakan</a></div>
        <div class="breadcrumb-item"><a href="#">Kategori Masakan</a></div>
        <div class="breadcrumb-item">Edit</div>
    </div>
    </div>
    <div class="row">
        <form method="POST" action="{{ route('kategoriMasakan.update', $pass->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
            @csrf
            {{method_field("PUT")}}
            <div class="col-12 col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Foto Kategori Masakan</h4>
                    </div>
                    <div class="card-body foto-upload">
                        <div class="form-group">
                            <div class="col-sm-12">
                                @if(!empty($pass->foto))
                                <div id="image-preview" class="image-preview" style="background: url('{{ asset('img_upload/kategori_masakan/'.$pass->foto) }}'); background-size: cover; background-repeat: no-repeat;">
                                    <label for="image-upload" id="image-label">Change File</label>
                                    <input type="file" name="foto" id="image-upload"/>
                                </div>
                                @else
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Pilih File</label>
                                    <input type="file" name="foto" id="image-upload"/>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Data Kategori Masakan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Kategori Masakan</label>
                                    <input type="text" class="form-control" name="kategori" required="" value="{{ $pass->kategori }} ">
                                    <div class="invalid-feedback">
                                        Form Kategori Masakan harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label" for="customCheck1">Setuju, dan sudah memeriksa data dengan benar.</label>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" id="submit-btn">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section("scriptLibraies")
    <script src="{{ asset('stisla/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('stisla/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/izitoast/js/iziToast.min.js') }}"></script>
@endsection
@section("scriptCustom")
    @include("layouts.components.toastSession")
    <script>
        $('#LIKategoriMasakan').addClass('active');
        $('.select2').select2()
    </script>
    <script src="{{ asset('stisla/js/page/features-post-create.js') }}"></script>
@endsection
