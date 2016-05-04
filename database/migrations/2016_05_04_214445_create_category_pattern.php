<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPattern extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('category_pattern', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('pattern');
            $table->integer('order');
            $table->integer('id_category')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_category')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('category_pattern');
    }
}
