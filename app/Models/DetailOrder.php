<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    public function masakan(){
        return $this->belongsTo(Masakan::class, "masakan_id");
    }
}
