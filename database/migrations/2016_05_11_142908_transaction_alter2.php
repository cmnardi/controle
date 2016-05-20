<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactionAlter2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //FITID
        Schema::table('transaction', function (Blueprint $table) {
            $table->string('fitid')->unique();
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
        Schema::table('transaction', function (Blueprint $table) {
            $table->dropColumn('fitid');
        });
    }
}
