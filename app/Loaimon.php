<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaimon extends Model
{
    //
    protected $primaryKey = "idLoaiMon";
    protected $table = "loaimon";
    public function monan(){
    	return $this->hasMany('App\Monan','idLoaiMon','idLoaiMon');	
    }
}
