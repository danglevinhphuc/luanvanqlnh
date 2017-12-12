<?php

namespace App\Http\Controllers;
use App\Loaimon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class LoaimonController extends Controller
{
    // lay danh sach loai mon an & uong dua ra 
    public function getDanhsach(){
    	$loaimon = Loaimon::all();
    	return view("admin.loaimon.danhsach",compact('loaimon'));
    }
    // show giao dien them loai mon an & uong
    public function themLoaiMon(){
    	return view("admin.loaimon.them");	
    }
    // post them loai mon an & uong
    public function sendThemLoaiMon(Request $req){
        // check form khi du lieu duoc gui len
        $this->validate($req,
            [
         'loaiMon' => 'unique:loaimon,loaiMon',  
         ],
         [
         'loaiMon.unique' => 'Tên này đã tồn tại hãy chọn tên khác',
         ]);
        $loaimon = new Loaimon();
        $loaimon->loaiMon = $req->loaiMon;
        $loaimon->loaiMonKhongDau= changeTitle($req->loaiMon);
        $loaimon->trangThai = $req->trangThai;
        $loaimon->save();
        return redirect()->back()->with("thanhcong","Thêm thông tin loại món ăn & thức uống thành công ");
    }
    // show giao dien sua thong tin loai mon
    public function suaLoaiMon($id){
        $loaimon = Loaimon::find($id);
        return view("admin.loaimon.sua",compact('loaimon'));
    }
    public function sendSuaLoaiMon(Request $req,$id){        
        $loaimon = Loaimon::find($id);
        $loaimon->loaiMon = $req->loaiMon;
        $loaimon->loaiMonKhongDau= changeTitle($req->loaiMon);
        $loaimon->trangThai = $req->trangThai;
        $loaimon->save();
        return redirect()->back()->with("thanhcong","Cập nhật thông tin loại món ăn & thức uống thành công ");
    }
    // lay thong tin loaimon 
    public function getTenLoaiMon(Request $req){
        $data = Loaimon::where('loaimon','=',$req->loaimon)->get();
        return response()->json(['data'=>$data]);// tra ve du lieu json
    }
    // xoa loai mon bien dau vao id khoa chinh
    public function xoaLoaiMon($id){
        $loaimon = Loaimon::find($id);
        $loaimon->delete();
        return redirect()->back()->with("thanhcong","Xoá loại món ăn & thức uống thành công");
    }
}
