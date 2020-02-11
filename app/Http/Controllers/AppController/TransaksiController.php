<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\Transaksi;
use App\Models\InformasiRestoran;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->level->level == "Waiter" || \Auth::user()->level->level == "Pelanggan"){
            $d['orders'] = Order::where("user_id", \Auth::user()->id)->where("status", "Dalam Proses")->orderBy("id", "DESC")->get();
        }
        else{
            $d['orders'] = Order::where("status", "Dalam Proses")->orderBy("id", "DESC")->get();
        }
        return view("app.order.list", $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('bayar') < $request->input('total_pembayaran')){
            return redirect()->back()->with('alertBlock', 'Bayar dengan uang yang sesuai harga!');
        }
        $order_id = $request->input("order_id");
        $d = new Transaksi;
        $d->total_pembayaran = $request->input("total_pembayaran");
        $d->order_id = $order_id;
        $d->user_id = $request->input("pelanggan_id");
        $d->kasir_id = \Auth::user()->id;
        $d->tanggal = Date("Y-m-d");
        $d->bayar = $request->input("bayar");
        $d->kembalian = $request->input("bayar") - $request->input("total_pembayaran");
        $d->metode_pembayaran = $request->input("metode_pembayaran");

        $d->save();

        $e = Order::find($order_id);
        $e->status = "Selesai";

        $e->save();

        return redirect()->route("riwayatTransaksi")->with("alertSuccess", "Berhasil Transaksi");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d['transaksi'] = Transaksi::find($id);
        $d['informasiRestoran'] = InformasiRestoran::first();
        $d["total_harga"] = DetailOrder::where("order_id", Transaksi::find($id)->order_id)->sum('sub_total');
        return view('app.transaksi.show', $d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }

    public function riwayatTransaksi()
    {
        if(\Auth()->user()->level->level == "Kasir"){
            $d['transaksis'] = Transaksi::where("kasir_id", \Auth::user()->id)->orderBy("id", "DESC")->get();
        }
        else{
            $d['transaksis'] = Transaksi::orderBy("id", "DESC")->get();
        }
        return view("app.transaksi.index", $d);
    }

    public function print(){
        if(\Auth::user()->level->level == "Waiter" || \Auth::user()->level->level == "Pelanggan"){
            $d['orders'] = Order::where("user_id", \Auth::user()->id)->orderBy("status", "ASC")->get();
        }
        else{
            $d['orders'] = Order::orderBy("status", "ASC")->get();
        }
        $d['informasiRestoran'] = InformasiRestoran::first();

        return view("app.order.print", $d);
    }
    public function printRiwayat(){
        if(\Auth()->user()->level->level == "Kasir"){
            $d['transaksis'] = Transaksi::where("kasir_id", \Auth::user()->id)->orderBy("id", "DESC")->get();
        }
        else{
            $d['transaksis'] = Transaksi::orderBy("id", "DESC")->get();
        }
        $d['informasiRestoran'] = InformasiRestoran::first();

        return view("app.transaksi.print", $d);
    }
    
}
