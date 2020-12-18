<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopingcartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopingcarts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flower_id')->unsigned();
            $table->string('flower_img');
            $table->string('flower_name');
            $table->integer('subtotal');
            $table->integer('Qty');
            $table->timestamps();

            $table->foreign('flower_id')->references('id')->on('flowers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopingcarts');
    }
}
