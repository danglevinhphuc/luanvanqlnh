<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cauhinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cauhinh', function (Blueprint $table) {
            $table->increments('idCauhinh');
            $table->string('logo');
            $table->string('maugiaodien');
            $table->string('lienhe');
            $table->string('diachi');
            $table->string('footer');
            $table->timestamps();
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
        Schema::drop('cauhinh');
    }
}
