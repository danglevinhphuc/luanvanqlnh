<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nhanvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nhanvien', function (Blueprint $table) {
            //
            $table->string('username', 50)->primary();
            $table->string('ho',50);
            $table->string('ten',50);
            $table->string('password',100);
            $table->date('ngaySinh')->nullable();
            $table->string('gioiTinh');
            $table->integer('sdt');
            $table->integer('cmnd');
            $table->string('diaChi',50)->nullable();
            $table->text('hinhDaiDien')->nullable();
            $table->integer('luong');
            $table->integer('trangThai');
            $table->rememberToken();
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
        Schema::drop('nhanvien');
    }
}
