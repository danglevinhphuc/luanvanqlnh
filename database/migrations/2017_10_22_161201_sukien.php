<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sukien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sukien', function (Blueprint $table) {
            $table->increments('idSuKien');
            $table->string('tenSuKien');
            $table->string('tenSuKienKhongDau');
            $table->longText('moTaSuKien');
            $table->float('phanTramGiamGia', 8, 2);
            $table->integer('trangThai');
            $table->string('hinhDaiDien')->nullable();
            $table->date('thoiGianBatDau');
            $table->date('thoiGianKetThuc');
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
        Schema::drop('sukien');
    }
}
