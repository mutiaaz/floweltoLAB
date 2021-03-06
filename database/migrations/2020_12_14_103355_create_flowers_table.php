<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned() ;
            $table->string('flower_name')->unique();
            $table->string('flower_img')->nullable();
            $table->integer('flower_price');
            $table->string('flower_desc');
            $table->timestamps();


        });

        Schema::table('flowers', function ($table){
            $table ->foreign('category_id')->references('id')->on('categories');
            //DB::statement('ALTER TABLE flowers ADD CONSTRAINT check_price_min CHECK (flower_price > 50000);');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flowers');
    }
}
