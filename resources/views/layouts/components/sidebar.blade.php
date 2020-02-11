    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Dyresto</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">DR</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            @if(Auth::user()->level->level == "Administrator")
                <li class="menu-header">Manajemen Restoran</li>
                <li id="LIInformasiRestoran"><a class="nav-link" href="{{ route('informasiRestoran.index') }}"><i class="fas fa-store-alt"></i> <span>Informasi Restoran</span></a></li>
                <li id="LIPengguna"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>
                <li class="menu-header">Daftar Meja</li>
                <li id="LIDaftarMeja"><a class="nav-link" href="{{ route('meja.index') }}"><i class="fas fa-chair"></i> <span>Daftar Meja</span></a></li>
                <li class="menu-header">Informasi Masakan</li>
                <li id="LIKategoriMasakan"><a class="nav-link" href="{{ route('kategoriMasakan.index') }}"><i class="fas fa-cubes"></i> <span>Kategori Masakan</span></a></li>
                <li id="LIMasakan"><a class="nav-link" href="{{ route('masakan.index') }}"><i class="fas fa-utensils"></i> <span>Masakan</span></a></li>
                <li class="menu-header">Transaksi</li>
                <li id="LIOrder"><a class="nav-link" href="{{ route('order.index') }}"><i class="fab fa-accusoft"></i> <span>Order</span></a></li>
                <li id="LITransaksi"><a class="nav-link" href="{{ route('transaksi.index') }}"><i class="fas fa-money-bill-alt"></i> <span>Transaksi</span></a></li>
                <li id="LIRiwayatTransaksi"><a class="nav-link" href="{{ route('riwayatTransaksi') }}"><i class="fas fa-book"></i> <span>Riwayat Transaksi</span></a></li>
                <li class="menu-header">Laporan</li>
                <li id="LILPPengguna"><a class="nav-link" href="{{ route('lpPengguna') }}"><i class="fas fa-print"></i> <span>LP Pengguna</span></a></li>
                <li id="LILPKategoriMasakan"><a class="nav-link" href="{{ route('lpKategoriMasakan') }}"><i class="fas fa-print"></i> <span>LP Kategori Masakan</span></a></li>
                <li id="LILPMasakan"><a class="nav-link" href="{{ route('lpMasakan') }}"><i class="fas fa-print"></i> <span>LP Masakan</span></a></li>
                <li id="LILPTransaksi"><a class="nav-link" href="{{ route('lpTransaksi') }}"><i class="fas fa-print"></i> <span>LP Transaksi</span></a></li>
                <li id="LILPRiwayatTransaksi"><a class="nav-link" href="{{ route('lpRiwayatTransaksi') }}"><i class="fas fa-print"></i> <span>LP RiwayatTransaksi</span></a></li>
            @elseif(Auth::user()->level->level == "Waiter")
                <li class="menu-header">Manajemen Restoran</li>
                <li id="LIPengguna"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>
                <li class="menu-header">Transaksi</li>
                <li id="LIOrder"><a class="nav-link" href="{{ route('order.index') }}"><i class="fab fa-accusoft"></i> <span>Order</span></a></li>
                <li id="LITransaksi"><a class="nav-link" href="{{ route('transaksi.index') }}"><i class="fas fa-money-bill-alt"></i> <span>Transaksi</span></a></li>
                <li class="menu-header">Laporan</li>
                <li id="LILPTransaksi"><a class="nav-link" href="{{ route('lpTransaksi') }}"><i class="fas fa-print"></i> <span>LP Transaksi</span></a></li>
            @elseif(Auth::user()->level->level == "Kasir")
                <li class="menu-header">Manajemen Restoran</li>
                <li id="LIPengguna"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>
                <li class="menu-header">Transaksi</li>
                <li id="LITransaksi"><a class="nav-link" href="{{ route('transaksi.index') }}"><i class="fas fa-money-bill-alt"></i> <span>Transaksi</span></a></li>
                <li id="LIRiwayatTransaksi"><a class="nav-link" href="{{ route('riwayatTransaksi') }}"><i class="fas fa-book"></i> <span>Riwayat Transaksi</span></a></li>
                <li class="menu-header">Laporan</li>
                <li id="LILPTransaksi"><a class="nav-link" href="{{ route('lpTransaksi') }}"><i class="fas fa-print"></i> <span>LP Transaksi</span></a></li>
                <li id="LILPRiwayatTransaksi"><a class="nav-link" href="{{ route('lpRiwayatTransaksi') }}"><i class="fas fa-print"></i> <span>LP RiwayatTransaksi</span></a></li>
            @elseif(Auth::user()->level->level == "Owner")
                <li class="menu-header">Laporan</li>
                <li id="LILPPengguna"><a class="nav-link" href="{{ route('lpPengguna') }}"><i class="fas fa-print"></i> <span>LP Pengguna</span></a></li>
                <li id="LILPKategoriMasakan"><a class="nav-link" href="{{ route('lpKategoriMasakan') }}"><i class="fas fa-print"></i> <span>LP Kategori Masakan</span></a></li>
                <li id="LILPMasakan"><a class="nav-link" href="{{ route('lpMasakan') }}"><i class="fas fa-print"></i> <span>LP Masakan</span></a></li>
                <li id="LILPTransaksi"><a class="nav-link" href="{{ route('lpTransaksi') }}"><i class="fas fa-print"></i> <span>LP Transaksi</span></a></li>
                <li id="LILPRiwayatTransaksi"><a class="nav-link" href="{{ route('lpRiwayatTransaksi') }}"><i class="fas fa-print"></i> <span>LP RiwayatTransaksi</span></a></li>
            @elseif(Auth::user()->level->level == "Pelanggan")
                <li class="menu-header">Transaksi</li>
                <li id="LIOrder"><a class="nav-link" href="{{ route('order.index') }}"><i class="fab fa-accusoft"></i> <span>Order</span></a></li>
            @endif
          </ul>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-info-circle"></i> {{ Auth::user()->level->level }} Dyresto
            </a>
          </div>

          <div class="mt-2 mb-4 p-3 hide-sidebar-mini">
          </div>
        </aside>
      </div>
