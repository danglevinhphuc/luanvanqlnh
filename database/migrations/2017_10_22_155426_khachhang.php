<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Khachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('khachhang', function (Blueprint $table) {
            $table->string('username', 50)->primary();
            $table->string('hoTen',50);
            $table->integer('cmnd');
            $table->integer('sdt');
            $table->string('password',100);
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
        Schema::drop('khachhang');
    }
}
