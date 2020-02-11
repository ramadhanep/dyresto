<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo("App\User", "user_id");
    }
    public function meja(){
        return $this->belongsTo(Meja::class, "meja_id");
    }

    public function detailOrders(){
        return $this->hasMany(DetailOrder::class);
    }
}
