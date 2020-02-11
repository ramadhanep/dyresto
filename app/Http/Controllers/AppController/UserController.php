<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Level;
use App\User;
use App\Models\InformasiRestoran;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->level->level == "Administrator"){
            $d['users'] = User::orderBy("id", "DESC")->get();
        }
        else{
            $d['users'] = User::where("level_id", 2)->orWhere("level_id", 3)->orWhere("level_id", 4)->orWhere("level_id", 5)->orderBy("id", "DESC")->get();
        }

        return view("app.users.index", $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d['levels'] = Level::orderBy("id", "DESC")->get();
        return view("app.users.create", $d);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'unique:users',
            'email' => 'unique:users'
        ]);
        $d = new User;
        $d->name = $request->input("name");
        $d->username = $request->input("username");
        $d->email = $request->input("email");
        $d->alamat = $request->input("alamat");
        $d->level_id = $request->input("level");
        $d->password= \Hash::make($request->input("password"));
        $d->restoran_id = 1;

        $foto = $request->file('foto');

        if(!empty($foto)){
            $rand = bin2hex(openssl_random_pseudo_bytes(100)).".".$foto->extension();
            $rand_md5 = md5($rand).".".$foto->extension();
            $d->foto = $rand_md5;

            $foto->move(public_path('img_upload/pengguna'),$rand_md5);
        }

        $d->save();

        return redirect()->route("users.index")->with("alertStore", $request->input("name"));
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
        $d['levels'] = Level::orderBy("id", "DESC")->get();
        $d['user'] = User::find($id);
        return view("app.users.edit", $d);
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
        $d = User::find($id);
        $d->name = $request->input("name");
        $d->alamat = $request->input("alamat");
        $d->level_id = $request->input("level");
        if(!empty($request->input("password"))){
            $d->password= \Hash::make($request->input("password"));
        }
        $d->restoran_id = 1;

        $foto = $request->file('foto');

        if(!empty($foto)){
            $rand = bin2hex(openssl_random_pseudo_bytes(100)).".".$foto->extension();
            $rand_md5 = md5($rand).".".$foto->extension();
            $d->foto = $rand_md5;

            $foto->move(public_path('img_upload/pengguna'),$rand_md5);
        }

        $d->save();

        return redirect()->route("users.index")->with("alertUpdate", $request->input("name"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = User::find($id);
        $name = $d->name;
        $d->delete();

        return redirect()->route("users.index")->with("alertDestroy", $name);
    }

    public function print(){
        $d['users'] = User::orderBy("id", "DESC")->get();
        $d['informasiRestoran'] = InformasiRestoran::first();

        return view("app.users.print", $d);
    }
}
