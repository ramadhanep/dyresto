<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("masakan_id")->unsigned();
            $table->bigInteger("jumlah")->unsigned();
            $table->double("sub_total");
            $table->boolean("status")->default(0);
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('keranjangs');
    }
}
