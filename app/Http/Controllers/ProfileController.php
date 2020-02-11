<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index(){
        $d['user'] = User::find(\Auth::user()->id);
        return view('profile.index', $d);
    }
    public function update(Request $request, $id){
        $d = User::find($id);
        $d->name = $request->input("name");
        $d->alamat = $request->input("alamat");
        if(!empty($request->input("password"))){
            $d->password= \Hash::make($request->input("password"));
        }
        $d->koperasi_id = 1;

        $foto = $request->file('foto');

        if(!empty($foto)){
            $rand = bin2hex(openssl_random_pseudo_bytes(100)).".".$foto->extension();
            $rand_md5 = md5($rand).".".$foto->extension();
            $d->foto = $rand_md5;

            $foto->move(public_path('img_upload/pengguna'),$rand_md5);
        }

        $d->save();

        return redirect()->route("profile")->with("alertUpdate", $request->input("name"));
    }
}
