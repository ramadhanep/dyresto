<?php

use Illuminate\Database\Seeder;

class InformasiRestoranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\InformasiRestoran::truncate();

        $d = new \App\Models\InformasiRestoran;
        $d->nama = "SMK N 10 Jakarta";
        $d->alamat = "Jl. Mayjen Soetoyo, Cawang, Kramatjati, RT.2/RW.9, Cawang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13630";
        $d->telepon = "(021) 8091773";
        $d->kode_pos = 13360;

        $d->save();
    }
}
