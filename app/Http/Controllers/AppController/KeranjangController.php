<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Keranjang;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
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

        // $c = Keranjang::all();

        // foreach($c as $res){
        //     if($res->user_id == $user_id && $res->masakan_id == $request->input("masakan_id")){
        //         $d = new Keranjang;
        //         $d->user_id = $user_id;
        //         $d->masakan_id = $request->input("masakan_id");
        //         $d->jumlah += 1;
        //         $d->sub_total += $request->input("harga");
        //         $d->status = 0;

        //         $d->save();
        //     }
        //     else{
        //         $d = new Keranjang;
        //         $d->user_id = $user_id;
        //         $d->masakan_id = $request->input("masakan_id");
        //         $d->jumlah = 1;
        //         $d->sub_total = $request->input("harga");
        //         $d->status = 0;

        //         $d->save();
        //     }
        // }

        $d = new Keranjang;
        $d->user_id = $user_id;
        $d->masakan_id = $request->input("masakan_id");
        $d->jumlah = $request->input("jumlah");
        $d->sub_total = $request->input("harga")*$request->input("jumlah");
        $d->status = 0;

        $d->save();

        return redirect()->route("order.index")->with("alertStoreKeranjang", $request->input("masakan_id"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
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

        return redirect()->route("order.index")->with("alertDestroy", $masakan_id);
    }
    public function clean()
    {
        Keranjang::truncate();
        return redirect()->route("order.index")->with("alertDestroy", "Mengosongkan Data!");
    }
}
