<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monan extends Model
{
    //
    protected $primaryKey = "idMonAn";
    protected $table = "monan";
    public function loaimon(){
    	return $this->belongsTo('App\Loaimon','idLoaiMon','idLoaiMon');	
    }
}
