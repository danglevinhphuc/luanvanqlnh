<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    //
    protected $primaryKey = "username";
    public $incrementing = false;
    protected $table = "khachhang";
}
