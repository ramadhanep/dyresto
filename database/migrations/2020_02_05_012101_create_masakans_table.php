<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masakans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("kategori_masakan_id")->unsigned();
            $table->string("nama_masakan");
            $table->double("harga");
            $table->string("status");
            $table->string("foto")->nullable();
            $table->timestamps();

            $table->foreign("kategori_masakan_id")->references("id")->on("kategori_masakans")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masakans');
    }
}
