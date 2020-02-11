<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Meja;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['mejas'] = Meja::orderBy("id", "DESC")->get();
        return view("app.meja.index", $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("app.meja.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Meja;
        $d->no_meja = $request->input("no_meja");
        $d->keterangan = $request->input("keterangan");

        $d->save();

        return redirect()->route("meja.index")->with("alertStore", $request->input("no_meja"));
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
        $d['pass'] = Meja::find($id);
        return view("app.meja.edit", $d);
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
        $d = Meja::find($id);
        $d->no_meja = $request->input("no_meja");
        $d->keterangan = $request->input("keterangan");

        $d->save();

        return redirect()->route("meja.index")->with("alertUpdate", $request->input("no_meja"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Meja::find($id);
        $no_meja = $d->no_meja;

        $d->delete();

        return redirect()->route("meja.index")->with("alertDestroy", $no_meja);
    }
}
