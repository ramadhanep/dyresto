<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\KategoriMasakan;
use App\Models\Masakan;
use App\Models\Transaksi;
use App\Models\RiwayatTransaksi;
use App\Models\Order;

class LaporanController extends Controller
{
    public function lpPengguna(){
        $d['users'] = User::orderBy("id", "DESC")->get();
        return view('app.laporan.lpPengguna', $d);
    }
    public function lpKategoriMasakan(){
        $d['kategoriMasakans'] = KategoriMasakan::orderBy("id", "DESC")->get();
        return view('app.laporan.lpKategoriMasakan', $d);
    }
    public function lpMasakan(){
        $d['masakans'] = Masakan::orderBy("id", "DESC")->get();
        return view('app.laporan.lpMasakan', $d);
    }
    public function lpTransaksi(){
        if(\Auth::user()->level->level == "Waiter" || \Auth::user()->level->level == "Pelanggan"){
            $d['orders'] = Order::where("user_id", \Auth::user()->id)->orderBy("status", "ASC")->get();
        }
        else{
            $d['orders'] = Order::orderBy("status", "ASC")->get();
        }
        return view("app.laporan.lpTransaksi", $d);
    }
    public function lpRiwayatTransaksi(){
        if(\Auth()->user()->level->level == "Kasir"){
            $d['transaksis'] = Transaksi::where("kasir_id", \Auth::user()->id)->orderBy("id", "DESC")->get();
        }
        else{
            $d['transaksis'] = Transaksi::orderBy("id", "DESC")->get();
        }
        return view("app.laporan.lpRiwayatTransaksi", $d);
    }
}
