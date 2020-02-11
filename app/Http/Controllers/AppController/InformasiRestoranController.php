<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\InformasiRestoran;

use Image;

class InformasiRestoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['d'] = InformasiRestoran::first();
        return view("app.informasiRestoran.index", $d);
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
        abort(404);
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
    public function update(Request $r, $id)
    {
        $d = InformasiRestoran::find($id);
        $d->nama = $r->input("nama");
        $d->alamat = $r->input("alamat");
        $d->telepon = $r->input("telepon");
        $d->keterangan = $r->input("keterangan");
        $d->kode_pos = $r->input("kode_pos");

        $foto = $r->file('foto');

        if(!empty($foto)){
            $rand = bin2hex(openssl_random_pseudo_bytes(100)).".".$foto->extension();
            $rand_md5 = md5($rand).".".$foto->extension();
            $d->foto = $rand_md5;

            $foto->move(public_path('img_upload/restoran'),$rand_md5);
        }

        $d->save();

        return redirect()->route("informasiRestoran.index")->with("alertUpdate", $r->input("nama"));
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
}
