<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Monan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('monan', function (Blueprint $table) {
            $table->increments('idMonAn');
            $table->string('tenMonAn');
            $table->string('tenMonAnKhongDau');
            $table->integer('giaMonAn');
            $table->integer('idLoaiMon')->unsigned();
            $table->foreign('idLoaiMon')->references('idLoaiMon')->on('loaimon')->onDelete('cascade');
            $table->longText('moTaMonAn')->nullable();
            $table->string("hinhAnhMonAn");
            $table->integer('trangThai');
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
        Schema::drop('monan');
    }
}
