<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("order_id")->unsigned();
            $table->bigInteger("masakan_id")->unsigned();
            $table->bigInteger("jumlah");
            $table->double("sub_total");
            $table->text('keterangan')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign("order_id")->references("id")->on("orders")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("masakan_id")->references("id")->on("masakans")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_orders');
    }
}
