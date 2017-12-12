<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Thanhtoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->increments('idThanhToan');
            $table->string('tenMon');
            $table->integer('giaMonAn');
            $table->integer('soLuong');
            $table->integer('maBan')->unsigned();
            $table->foreign('maBan')->references('maBan')->on('banan')->onDelete('cascade');
            $table->integer('trangThai');
            $table->date("ngayDat");
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
        Schema::drop('thanhtoan');
    }
}
