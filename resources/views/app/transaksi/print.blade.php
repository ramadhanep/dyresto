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
            <span class="badge badge-primary">Laporan Daftar Riwayat Transaksi</span>
        </div>
        <div class="hr-line"></div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Kasir</th>
                        <th>Nomor Meja</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @include("_____FUNCTION.tglIndo")
                    @foreach($transaksis as $res)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($res->user->level->level == "Pelanggan")
                            <i class="fas fa-star" style="color: #ffa426"></i> {{ $res->user->name }}
                            @else
                            <i class="fas fa-star"></i> {{ $res->user->name }}
                            @endif
                        </td>
                        <td>{{ $res->kasir->name }}</td>
                        <td>
                            <div class="badge badge-primary">
                                {{ $res->order->meja->no_meja }}
                            </div>
                        </td>
                        <td>{{ tgl_indo($res->tanggal) }}</td>
                        <td>
                            @if(strlen($res->order->keterangan) > 70)
                            {!! substr($res->order->keterangan,0,70) !!}..
                            @else
                            {!! $res->order->keterangan !!}
                            @endif
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
