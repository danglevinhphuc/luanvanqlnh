<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    //
    protected $primaryKey = "username";
    public $incrementing = false;
    protected $table = "nhanvien";
    public function phanquyen(){
    	return $this->hasMany('App\Phanquyen','username','username');	
    }
    
}
