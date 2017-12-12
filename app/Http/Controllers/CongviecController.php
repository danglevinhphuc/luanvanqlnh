<?php

namespace App\Http\Controllers;
use App\Nhanvien;
use App\Khachhang;
use App\Monan;
use App\Sukien;
use App\Banan;
use App\Thanhtoan;
use App\Doanhthu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;
use DB;
use Cookie;
class CongviecController extends Controller
{
    // show giao dien cho dau bep ve so luong mon an
    public function getDauBep(){
    	return view("admin.congviec.daubep");
    }
    // show giao dien cho phuc vu 
    public function getPhucVu(){
    	return view("admin.congviec.phucvu");
    }
    // show giao dien thanh toan 
    public function getThanhToan(){
    	$banan = Banan::all();// ban an
        $today =date("Y-m-d"); // thoi gian hien tai
        $sukien = Sukien::select("phanTramGiamGia")->where([["thoiGianBatDau","<=",$today],['trangThai',"=","1"]])->orderBy('idSuKien', 'desc')->first();
        return view("admin.congviec.thanhtoan",compact('banan','sukien'));	
    }
    /** Cap nhat so luong san pham truoc khi thanh toan **/
    public function updateThanhToan(Request $req){
        $idThanhToan = $req->idThanhToan;// lay id thanh toan
        $thanhtoan = Thanhtoan::find($idThanhToan);
        if($req->soLuong > 0){
            $thanhtoan->soLuong = $req->soLuong;
            $thanhtoan->save();
            $data = 1;
        }else{
            $data = 0;
        }
        return response()->json(['data'=>$data]);// tra ve du lieu
    }
    /** HAM LAY DU LIEU THANH TOAN QA MA BAN ***/
    public function postThanhToanAjax(Request $req){
        $maBan = $req->data;
        $thanhtoan = DB::table('thanhtoan')
        ->select('*', DB::raw('SUM(soLuong) as soluong'))
        ->where([['maBan',"=",$maBan],["trangThai","=",0]])
        ->groupBy('tenMon')
        ->get();
        return response()->json(['data'=>$thanhtoan]);// tra ve du lieu 
    }
    /*XAC THUC TAI KHOAN VIP ***/
    public function postTkVipAjax(Request $req){
        $khachhang =  Khachhang::where([["sdt","=",$req->sdt],
            ["trangThai","=",0]])->first();
        if(isset($khachhang)){// tao cookie khi co du lieu
            Cookie::queue('vip', 1);
        }else{
            Cookie::queue('vip', 0);
        }
        return response()->json(['data'=>$khachhang]);// tra ve du lieu    
    }
    /**XUAT FILE PDF **/
    public function getInHoaDon($id,$theloai){
        $vip = Cookie::get('vip');
        $today =date("Y-m-d_h:i:sa"); // thoi gian hien tai
        $todayNotTime =date("Y-m-d"); // thoi gian hien tai nhung khong co gio phut giay
        $maBan = $id;
        $thanhtoan = DB::table('thanhtoan')
        ->select('*', DB::raw('SUM(soLuong) as soluong'))
        ->where([['maBan',"=",$maBan],["trangThai","=",0]])
        ->groupBy('tenMon')
        ->get();
        $sukien = Sukien::select("phanTramGiamGia")->where([["thoiGianBatDau","<=",$today],['trangThai',"=","1"]])->orderBy('idSuKien', 'desc')->first();                
        $tongTienGiam = 0;     
        $tong = 0;
        if(isset($sukien)){// truong hop co su kien de giam gia
            if($sukien->phanTramGiamGia != ""){
                for($i = 0 ; $i < count($thanhtoan) ;$i++){
                    $tong= $tong +$thanhtoan[$i]->giaMonAn*$thanhtoan[$i]->soluong;
                }
            }
            /** Tinh tien khi co phan tram giam gia cua su kien **/
            if($vip == 1){// truong hop tien khi co su dung tk vip
                $tongTienGiam = ($tong*(100-($sukien->phanTramGiamGia + 5)))/100;
            }else{
                $tongTienGiam = ($tong*(100-($sukien->phanTramGiamGia))/100);
            }
            $collection = (['phantram' => $sukien->phanTramGiamGia, 'thanhtiengiam' => $tongTienGiam]);
            $thanhtoan->push($collection);
        }else{
            // truong hop k co su kien
            for($i = 0 ; $i < count($thanhtoan) ;$i++){
                $tongTienGiam= $tongTienGiam +$thanhtoan[$i]->giaMonAn*$thanhtoan[$i]->soluong;// gan tong gia tri vao $tongTienGiam
            }
            if($vip == 1){
                // truong hop khi su dung vip
                $tongTienGiam =  ($tongTienGiam*(100-5)/100);
            }
        }        
        if($theloai == 1){// su dung the tinh dung
            return response()->json(['data'=>$tongTienGiam]);// tra ve du lieu  
        }else{// su dung thanh toan truc tiep
            // gui du lieu den db doanhthu
            $nhapDoanhThu = Doanhthu::where("ngayDat","=",$todayNotTime)->first();
            /**Truong hop doanh thu ngay hom nay da ton tai */
            if($nhapDoanhThu){
                // thi cap nhap lai doanh thu bang gia tri moi cua ngay hom nay
                $tienBanDau = $nhapDoanhThu->tongTien;
                $capNhatDoanhThu = Doanhthu::find($nhapDoanhThu->idDoanhThu);
                $capNhatDoanhThu->tongTien =$tienBanDau+ $tongTienGiam;
            $capNhatDoanhThu->save(); // luu gia ket qua
        }else{
                // tao moi doanh thu cho ngay hom nay
            $taoMoiDoanhThu = new Doanhthu();
            $taoMoiDoanhThu->ngayDat = $todayNotTime;
            $taoMoiDoanhThu->tongTien= $tongTienGiam;
            $taoMoiDoanhThu->save();// luu lai ket qua
        }
        /**CAP NHAT LAI TRANG THAI KHI THANH TOAN */
        $thanhtoantrangthai = Thanhtoan::where('maBan',"=",$maBan)->get();
        foreach ($thanhtoantrangthai as $ts) {
            # code...
            // cap nhat lai trang thai
            $capnhat = Thanhtoan::find($ts->idThanhToan);
            $capnhat->trangThai = 1;
            $capnhat->save();
        }
        $pdf =PDF::loadView("pdf",['thanhtoan'=>$thanhtoan]);
        Cookie::queue('vip', 0);
        return $pdf->download('thanhtoan.pdf');
    }
}
}
