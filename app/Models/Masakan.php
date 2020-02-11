<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    public function kategoriMasakan(){
        return $this->belongsTo(kategoriMasakan::class, "kategori_masakan_id");
    }
}
