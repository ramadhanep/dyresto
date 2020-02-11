<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KategoriMasakan;
use App\Models\InformasiRestoran;

class KategoriMasakanController extends Controller
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
            $d['kategoriMasakans'] = KategoriMasakan::where("kategori", 'LIKE','%'.$q.'%')->orderBy("id", "DESC")->paginate(8);
        }
        else{
            $d['kategoriMasakans'] = KategoriMasakan::orderBy("id", "DESC")->paginate(8);
        }
        $d['q'] = $q;
        return view("app.kategoriMasakan.index", $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("app.kategoriMasakan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new KategoriMasakan;
        $d->kategori = $request->input("kategori");
        $foto = $request->file('foto');

        if(!empty($foto)){
            $rand = bin2hex(openssl_random_pseudo_bytes(100)).".".$foto->extension();
            $rand_md5 = md5($rand).".".$foto->extension();
            $d->foto = $rand_md5;

            $foto->move(public_path('img_upload/kategori_masakan'),$rand_md5);
        }

        $d->save();

        return redirect()->route("kategoriMasakan.index")->with("alertStore", $request->input("kategori"));
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
        $d['pass'] = KategoriMasakan::find($id);
        return view("app.kategoriMasakan.edit", $d);
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
        $d = KategoriMasakan::find($id);
        $d->kategori = $request->input("kategori");
        $foto = $request->file('foto');

        if(!empty($foto)){
            $rand = bin2hex(openssl_random_pseudo_bytes(100)).".".$foto->extension();
            $rand_md5 = md5($rand).".".$foto->extension();
            $d->foto = $rand_md5;

            $foto->move(public_path('img_upload/kategori_masakan'),$rand_md5);
        }

        $d->save();

        return redirect()->route("kategoriMasakan.index")->with("alertUpdate", $request->input("kategori"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = KategoriMasakan::find($id);
        $kategori = $d->kategori;

        $d->delete();

        return redirect()->route("kategoriMasakan.index")->with("alertDestroy", $kategori);
    }

    public function print(){
        $d['kategoriMasakans'] = KategoriMasakan::orderBy("id", "DESC")->get();
        $d['informasiRestoran'] = InformasiRestoran::first();

        return view("app.kategoriMasakan.print", $d);
    }
}
