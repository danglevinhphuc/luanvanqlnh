<?php

namespace App\Http\Controllers;
use App\Sukien;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class SukienController extends Controller
{
    // lay danh sach loai mon an & uong dua ra 
    public function getDanhsach(){
    	$sukien = Sukien::all();
        $today =date('Y-m-d');// lay ngay hom nay
        // tao vong lap so sanh ngay hom nay va ngay ket thuc
        // neu khong hop le thi xoa bo
        foreach ($sukien as $key => $value) {
            # code...
            $timeFinish = $sukien[$key]->thoiGianKetThuc;
            if($today > $timeFinish){
                $idSuKien = $sukien[$key]->idSuKien; // lay id cua su kien ra cho viec update
                $sukienUpdate = Sukien::find($idSuKien);
                $sukienUpdate->trangThai = 0;
                $sukienUpdate->save();
            }
        }
        return view("admin.sukien.danhsach",compact('sukien'));
    }
    // show giao dien them su kien
    public function themSuKien(){
    	return view("admin.sukien.them");	
    }
    // nhan du lieu tu su kien
    public function sendThemSuKien(Request $req){
        $sukien = new Sukien();
        $sukien->tenSuKien = $req->tenSuKien;
        $sukien->tenSuKienKhongDau = changeTitle($req->tenSuKien);
        $sukien->moTaSuKien = $req->moTaSuKien;
        $sukien->phanTramGiamGia = $req->phanTramGiamGia;
        $sukien->trangThai = 1;
        $sukien->thoiGianBatDau= $req->thoiGianBatDau;
        $sukien->thoiGianKetThuc = $req->thoiGianKetThuc;
        // kiem tra su kien co ton tai khong
        $checkEventExit = Sukien::where("thoiGianBatDau","=",$req->thoiGianBatDau)->first();
        if(!isset($checkEventExit)){
            // truong hop khong ton tai
            if($req->thoiGianBatDau <= $req->thoiGianKetThuc){
            if($req->hinhDaiDien == null){//khong ton tai up link
                if($req->hasFile('file')){
                # code...
               // luu hinh anh
                    $file = $req->file("file");
                    $filename = $file->getClientOriginalName("file");
                $Hinh = str_random(4)."_".$filename;// lay ten hinh
                $file->storeAs(
                    'upload/sukien',// vi tri luu
                    $Hinh
                );
                $sukien->hinhDaiDien = $Hinh;
            }
        }else{
            $sukien->hinhDaiDien = $req->hinhDaiDien;
        }
        $sukien->save();
        return redirect()->back()->with("thanhcong","Thêm thông sự kiện mới thành công ");
    }else{
        return redirect()->back()->with("thatbai","Thời gian bắt đầu và kết thúc không hợp lý");
    }
}else{
    return redirect()->back()->with("thatbai","Thời gian sự kiện này đã tồn tại");
}
}
    // show giao dien sua su kien
public function suaSuKien($id){
    $sukien = Sukien::find($id);
    return view("admin.sukien.sua",compact('sukien'));
}
    // nhan du lieu va su lieu su kien 2 du lieu dau vao
    // thong tin va id cua su kien
public function sendSuaSuKien(Request $req,$id){
    $sukien = Sukien::find($id);
    $sukien->tenSuKien = $req->tenSuKien;
    $sukien->tenSuKienKhongDau = changeTitle($req->tenSuKien);
    $sukien->moTaSuKien = $req->moTaSuKien;
    $sukien->phanTramGiamGia = $req->phanTramGiamGia;
    $sukien->trangThai = $req->trangThai;
    $sukien->thoiGianBatDau= $req->thoiGianBatDau;
    $sukien->thoiGianKetThuc = $req->thoiGianKetThuc;
    if($req->thoiGianBatDau <= $req->thoiGianKetThuc){
        if($req->hinhDaiDien == null){//khong ton tai up link
            if($req->hasFile('file')){
                # code...
               // luu hinh anh
                // cap nhat hinh anh tim thay thi xoa hinh va them lai hinh moi
                if($sukien->hinhDaiDien != null){
                    while(file_exists('storage/app/upload/sukien/'.$sukien->hinhDaiDien)){
                        unlink('storage/app/upload/sukien/'.$sukien->hinhDaiDien);
                    }
                }
                $file = $req->file("file");
                $filename = $file->getClientOriginalName("file");
                $Hinh = str_random(4)."_".$filename;// lay ten hinh
                $file->storeAs(
                    'upload/sukien',// vi tri luu
                    $Hinh
                );
                $sukien->hinhDaiDien = $Hinh;
            }
        }else{
            $sukien->hinhDaiDien = $req->hinhDaiDien;
        }

        $sukien->save();
        return redirect()->back()->with("thanhcong","Cập nhật thông tin sự kiện thành công ");
    }else{
        return redirect()->back()->with("thatbai","Thời gian bắt đầu và kết thúc không hợp lý");
    }
    
}
    // xoa su kien thong qua id truyen vao 
public function xoaSuKien($id){
    $sukien = Sukien::find($id);
    $sukien->delete();
    return redirect()->back()->with("thanhcong","Xoá sự kiện thành công");
}
}
