<?php

namespace App\Http\Controllers;
use App\Monan;
use App\Loaimon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class MonanController extends Controller
{
    // lay danh sach loai mon an 
    public function getDanhsach(){
    	$monan = Monan::all();
    	return view("admin.monan.danhsach",compact('monan'));
    }
    // show giao dien them mon an vao thuc don
    public function themMonAn(){
        $loaimon = Loaimon::all();
        return view("admin.monan.them",compact('loaimon'));
    }
    // them du lieu cho mon an
    public function sendThemMonAn(Request $req){
        // check form khi du lieu duoc gui len
        $this->validate($req,
            [
               'tenMonAn' => 'unique:monan,tenMonAn'
           ],
           [
               'tenMonAn.unique' => 'Tên món ăn đã tồn tại hãy chọn tên khác',
           ]);
        $monan = new Monan();
        $monan->tenMonAn = $req->tenMonAn;
        $monan->tenMonAnKhongDau = changeTitle($req->tenMonAn);
        $monan->giaMonAn = $req->giaMonAn;
        $monan->idLoaiMon = $req->idLoaiMon;
        $monan->moTaMonAn = $req->moTaMonAn;
        $monan->trangThai = 0;
        if($req->hinhDaiDien == null){//khong ton tai up link
            if($req->hasFile('file')){
                # code...
               // luu hinh anh
                $file = $req->file("file");
                $filename = $file->getClientOriginalName("file");
                $Hinh = str_random(4)."_".$filename;// lay ten hinh
                $file->storeAs(
                    'upload/monan',// vi tri luu
                    $Hinh
                );
                $monan->hinhAnhMonAn = $Hinh;
            }
        }else{
            $monan->hinhAnhMonAn = $req->hinhDaiDien;
        }
        $monan->save();
        return redirect()->back()->with("thanhcong","Thêm thông tin món ăn & thức uống mới thành công ");
    }
    //show giao dien sua mon an
    public function suaMonAn($idMonAn){
        $monan = Monan::find($idMonAn);
        $loaimon = Loaimon::all();
        return view("admin.monan.sua",compact('monan','loaimon'));
    }
    // cap nhat du lieu sua mon an
    public function sendSuaMonAn(Request $req,$id){
        $monan = Monan::find($id);
        $monan->tenMonAn = $req->tenMonAn;
        $monan->tenMonAnKhongDau = changeTitle($req->tenMonAn);
        $monan->giaMonAn = $req->giaMonAn;
        $monan->idLoaiMon = $req->idLoaiMon;
        $monan->moTaMonAn = $req->moTaMonAn;
        $monan->trangThai = $req->trangThai;
        if($req->hinhDaiDien == null){//khong ton tai up link
            if($req->hasFile('file')){
                # code...
               // luu hinh anh
                // cap nhat hinh anh tim thay thi xoa hinh va them lai hinh moi
                if($monan->hinhAnhMonAn != null){
                    while(file_exists('storage/app/upload/monan/'.$monan->hinhAnhMonAn)){
                        unlink('storage/app/upload/monan/'.$monan->hinhAnhMonAn);
                    }
                }
                $file = $req->file("file");
                $filename = $file->getClientOriginalName("file");
                $Hinh = str_random(4)."_".$filename;// lay ten hinh
                $file->storeAs(
                    'upload/monan',// vi tri luu
                    $Hinh
                );
                $monan->hinhAnhMonAn = $Hinh;
            }
        }else{
            $monan->hinhAnhMonAn = $req->hinhDaiDien;
        }
        $monan->save();
        return redirect()->back()->with("thanhcong","Cập nhật thông tin món ăn & thức uống thành công ");
    }
    // lay thong tin loaimon 
    public function getTenMonAn(Request $req){
        $data = Monan::where('tenMonAn','=',$req->tenMonAn)->get();
        return response()->json(['data'=>$data]);// tra ve du lieu json
    }
    // xoa mon an 1 gia tri dau vao la idMonAn
    public function xoaMonAn($id){
        $monan = Monan::find($id);
        $monan->delete();
        return redirect()->back()->with("thanhcong","Xoá món ăn & thức uống thành công");
    }
    /* CAP NHAT TRANG THAI Khach HANG  **/ 
    public function capNhapTrangThai($id){
        $monan = Monan::find($id);
        if($monan->trangThai == 1){
            $monan->trangThai = 0;
        }else{
            $monan->trangThai = 1;
        }
        $monan->save();
        return response()->json(['success'=>'Cập nhật trạng thái cho món ăn thành công']);// tra ve du lieu json
    }
}
