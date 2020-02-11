<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("meja_id")->unsigned();
            $table->date("tanggal");
            $table->text("keterangan")->nullable();
            $table->string("status");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("meja_id")->references("id")->on("mejas")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
