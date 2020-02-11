<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KategoriMasakan;
use App\Models\Masakan;
use App\Models\InformasiRestoran;

class MasakanController extends Controller
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
        return view("app.masakan.index", $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d['kategoriMasakans'] = KategoriMasakan::orderBy("id", "DESC")->get();
        return view("app.masakan.create", $d);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Masakan;
        $d->kategori_masakan_id = $request->input("kategori_masakan");
        $d->nama_masakan = $request->input("nama_masakan");
        $d->harga = $request->input("harga");
        $d->status = $request->input("status");
        $foto = $request->file('foto');

        if(!empty($foto)){
            $rand = bin2hex(openssl_random_pseudo_bytes(100)).".".$foto->extension();
            $rand_md5 = md5($rand).".".$foto->extension();
            $d->foto = $rand_md5;

            $foto->move(public_path('img_upload/masakan'),$rand_md5);
        }

        $d->save();

        return redirect()->route("masakan.index")->with("alertStore", $request->input("nama_masakan"));
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
        $d['kategoriMasakans'] = KategoriMasakan::orderBy("id", "DESC")->get();
        $d['pass'] = Masakan::find($id);
        return view("app.masakan.edit", $d);
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
        $d = Masakan::find($id);
        $d->kategori_masakan_id = $request->input("kategori_masakan");
        $d->nama_masakan = $request->input("nama_masakan");
        $d->harga = $request->input("harga");
        $d->status = $request->input("status");
        $foto = $request->file('foto');

        if(!empty($foto)){
            $rand = bin2hex(openssl_random_pseudo_bytes(100)).".".$foto->extension();
            $rand_md5 = md5($rand).".".$foto->extension();
            $d->foto = $rand_md5;

            $foto->move(public_path('img_upload/masakan'),$rand_md5);
        }

        $d->save();

        return redirect()->route("masakan.index")->with("alertUpdate", $request->input("nama_masakan"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Masakan::find($id);
        $nama_masakan = $d->nama_masakan;

        $d->delete();

        return redirect()->route("masakan.index")->with("alertDestroy", $nama_masakan);
    }

    public function print(){
        $d['masakans'] = Masakan::orderBy("id", "DESC")->get();
        $d['informasiRestoran'] = InformasiRestoran::first();

        return view("app.masakan.print", $d);
    }
}
