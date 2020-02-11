<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiRestoransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_restorans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nama");
            $table->text("alamat")->nullable();
            $table->text("keterangan")->nullable();
            $table->string("telepon");
            $table->string("foto")->nullable();
            $table->string("kode_pos")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_restorans');
    }
}
