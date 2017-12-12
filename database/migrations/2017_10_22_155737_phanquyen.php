<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Phanquyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phanquyen', function (Blueprint $table) {
            $table->increments('idPhanQuyen');
            $table->string('username');
            $table->integer('quanly');
            $table->integer('phucvu');
            $table->integer('daubep');
            $table->foreign('username')->references('username')->on('nhanvien')->onDelete('cascade');
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
        Schema::drop('phanquyen');
    }
}
