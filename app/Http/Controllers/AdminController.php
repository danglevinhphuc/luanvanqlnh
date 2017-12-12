<?php

namespace App\Http\Controllers;
use App\Nhanvien;
use App\Khachhang;
use App\Monan;
use App\Sukien;
use App\Thanhtoan;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class AdminController extends Controller
{
    // lay danh sach thống ke so luong nhan vien , thong tin quan ly
    public function getDanhsach(){
    	$nhanvien = Nhanvien::count();
        $khachhang = Khachhang::count();
        $monan = Monan::count();
        $sukien = Sukien::count();
        $ngay = date("d");// ngay
        $lastDayOnThisMouth = date("t", strtotime("-1 month") );
		$thang= date("m");// thang 
		$nam = date("Y");// nam
		// thoi gian dau tien thang
		$ngayBatdauthang = $nam."-".$thang."-"."01";
		// thoi gian cuoi thang 
		$ngayCuoithang= $nam."-".$thang."-".$lastDayOnThisMouth;
		/**Tong so tien thu duoc trong 1 khoang thoi gian tren thang **/
		$query_doanhthu = DB::table('doanhthu')
               ->select(DB::raw('SUM(tongTien) as doanhthutheothang'))
                     ->where([["ngayDat",">=",$ngayBatdauthang],["ngayDat","<",$ngayCuoithang]])
                     ->get();	
        /**Tong so tien thu duoc theo tung ngay **/
        $query_tungngay = DB::table('doanhthu')
               ->select("ngayDat",DB::raw('SUM(tongTien) as doanhthutungngay'))
                     ->where([["ngayDat",">=",$ngayBatdauthang],["ngayDat","<",$ngayCuoithang]])
                     ->groupBy('ngayDat')
                     ->get();
    	return view("admin.thongke",compact('nhanvien','khachhang','monan','sukien','query_doanhthu','query_tungngay'));
    }
}
