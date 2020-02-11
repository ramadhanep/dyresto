<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function order(){
        return $this->belongsTo(Order::class, "order_id");
    }
    public function user(){
        return $this->belongsTo("App\User", "user_id");
    }
    public function kasir(){
        return $this->belongsTo("App\User", "kasir_id");
    }
}
