@if(session('alertDestroy'))
    <script>
        iziToast.success({
            title: 'Berhasil menghapus Data!',
            message: "{{ session('alertDestroy') }}",
            position: 'bottomRight'
        });
    </script>
@elseif(session('alertUpdate'))
    <script>
        iziToast.success({
            title: 'Berhasil mengedit Data!',
            message: "{{ session('alertUpdate') }}",
            position: 'bottomRight'
        });
    </script>
@elseif(session('alertStore'))
    <script>
        iziToast.success({
            title: 'Berhasil menambah Data!',
            message: "{{ session('alertStore') }}",
            position: 'bottomRight'
        });
    </script>
@elseif(session('alertStoreKeranjang'))
    <script>
        iziToast.success({
            title: 'Berhasil menambahkan ke keranjang!',
            message: "{{ session('alertStore') }}",
            position: 'bottomRight'
        });
    </script>

@elseif(session('alertBlock'))
    <script>
        iziToast.warning({
            title: 'Gagal Menyimpan Data!',
            message: "{{ session('alertBlock') }}",
            position: 'bottomRight'
        });
    </script>
@endif

@error('email')
    <script>
        iziToast.warning({
            title: 'Gagal Menyimpan Data!',
            message: "Email Sudah Digunakan!",
            position: 'bottomRight'
        });
    </script>
@enderror
