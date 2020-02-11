<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\InformasiRestoran;
use App\Models\Keranjang;
use App\Models\Meja;
use App\Models\Masakan;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;

        if(!empty($q)){
            $d['masakans'] = Masakan::where("nama_masakan", 'LIKE','%'.$q.'%')->orWhere("harga", 'LIKE','%'.$q.'%')->orWhere("kategori_masakan_id", 'LIKE','%'.$q.'%')->orderBy("id", "DESC")->paginate(8);
        }
        else{
            $d['masakans'] = Masakan::orderBy("id", "DESC")->paginate(8);
        }
        $d['q'] = $q;
        $d['mejas'] = Meja::orderBy("no_meja", "ASC")->get();
        $d['keranjangs'] = Keranjang::where("user_id", \Auth::user()->id)->where("status", 0)->orderBy("id", "DESC")->get();
        $d["total_harga"] = Keranjang::where("user_id", \Auth::user()->id)->where("status", 0)->sum('sub_total');
        return view("app.order.index", $d);
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

        $user_id = \Auth::user()->id;

        $c = Order::orderBy("id", "DESC")->first();
        if(!empty($c->id)){
            $order_id = $c->id + 1;
        }
        else{
            $order_id = 1;
        }
        $d = new Order;
        $d->id = $order_id;
        $d->user_id = $user_id;
        $d->meja_id = $request->input("meja_id");
        $d->tanggal = date("Y-m-d");
        $d->keterangan = $request->input("keterangan");
        $d->status = "Dalam Proses";

        $d->save();

        $e = Keranjang::where("user_id", $user_id)->where("status", 0)->get();
        foreach($e as $res){
            $f = new DetailOrder;
            $f->order_id = $order_id;
            $f->masakan_id = $res->masakan_id;
            $f->jumlah = $res->jumlah;
            $f->sub_total = $res->sub_total;
            $f->save();
        }

        Keranjang::where("user_id", $user_id)->delete();

        return redirect()->route("order.show", $order_id)->with("alertStore", "Berhasil membuat pesanan (Order)");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d['informasiRestoran'] = InformasiRestoran::first();
        $d['order'] = Order::find($id);
        $d['detailOrders'] = DetailOrder::where("order_id", $id)->orderBy("id", "DESC")->get();
        $d["total_harga"] = DetailOrder::where("order_id", $id)->sum('sub_total');

        return view("app.order.show", $d);
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
        $d = Keranjang::find($id);
        $masakan_id = $d->masakan_id;

        $d->delete();

        return redirect()->route("keranjang.index")->with("alertDestroy", $masakan_id);
    }
}
