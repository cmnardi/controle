<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->decimal('value');
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
        Schema::drop('transaction');
    }
}
