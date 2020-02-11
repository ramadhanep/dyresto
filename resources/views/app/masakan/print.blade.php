@include("layouts.components.head")
<style>
    body{
        background-color: #fff !important;
    }
    .img-print img{
        width: 100px;
    }
</style>
<section class="section">
    <div class="print-padding d-flex flex-column text-left">
        <div class="img-print d-flex justify-content-center mb-4">
            <img src="{{ asset('img_upload/restoran/'.$informasiRestoran->foto) }}" alt="{{ $informasiRestoran->nama }}">
        </div>
        <div class="w-full text-center d-flex justify-content-center flex-column">
            <h1>{{ $informasiRestoran->nama }}</h1>
            <p>{!! $informasiRestoran->alamat !!}</p>
        </div>
        <div class="text-center mt-3">
            <span class="badge badge-primary">Laporan Daftar Masakan</span>
        </div>
        <div class="hr-line"></div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Masakan</th>
                    <th>Kategori Masakan</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($masakans as $res)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if(!empty($res->foto))
                        <img src="{{ asset('img_upload/masakan/'.$res->foto) }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $res->nama_masakan }}" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                        @else
                        <img src="{{ asset('img/masakan.jpg') }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $res->nama_masakan }}" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                        @endif
                    </td>
                    <td>{{ $res->nama_masakan }}</td>
                    <td>{{ $res->kategoriMasakan->kategori }}</td>
                    <td>IDR {{ number_format($res->harga,2,',','.') }}</td>
                    <td>
                        <div class="badge @if($res->status == "Tersedia") badge-primary @else badge-danger @endif">
                            {{ $res->status }}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    window.print()
</script>
