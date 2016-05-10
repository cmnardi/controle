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
         Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('pattern')->nullable();
            $table->integer('order');
            $table->integer('id_category')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('category', function (Blueprint $table) {
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
        Schema::drop('category');
    }
}
