<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thanhtoan extends Model
{
    //
    protected $primaryKey = "idThanhToan";
    
    protected $table = "thanhtoan";
    public function banan(){
    	return $this->belongsTo('App\Banan','maBan','maBan');	
    }
}
