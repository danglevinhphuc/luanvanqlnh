<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phanquyen extends Model
{
    //
    protected $primaryKey = "idPhanQuyen";
    protected $table = "phanquyen";
    public function nhanvien(){
    	return $this->belongTo('App\Nhanvien','username','username');	
    }
}
