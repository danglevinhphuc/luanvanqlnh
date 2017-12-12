<?php

namespace App\Http\Controllers;
use App\Nhanvien;
use App\Phanquyen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class NhansuController extends Controller
{
    // lay danh sach nhan su dua ra 
    public function getDanhsach(){
    	$nhansu = Nhanvien::all();
    	return view("admin.nhansu.danhsach",compact('nhansu'));
    }
    // show giao dien them nhan su
    public function themNhanSu(){
    	return view("admin.nhansu.them");	
    }
    // nhan du lieu thu form them nhan su
    public function sendThemNhanSu(Request $req){
    	// check form khi du lieu duoc gui len
    	$this->validate($req,
    		[
         'username' => 'unique:nhanvien,username',
          'cmnd' => 'unique:nhanvien,cmnd',
          'sdt' => 'unique:nhanvien,sdt',
         ],
         [
         'username.unique' => 'Tài khoản đã tồn tại hãy chọn tài khoản khác',
         'cmnd.unique' => 'Chứng minh nhân dân đã được sử dụng',
         'sdt.unique' => 'Số điện thoại đã được sử dụng',
         ]);
        // tao thong tin nhan vien
    	$nhanvien = new Nhanvien();
    	$nhanvien->username = $req->username;
    	$nhanvien->ho = $req->ho;
    	$nhanvien->ten = $req->ten;
    	$nhanvien->password = Hash::make($req->password);
    	$nhanvien->ngaySinh = $req->ngaySinh;
    	$nhanvien->gioiTinh = $req->gioiTinh;
    	$nhanvien->sdt= $req->sdt;
    	$nhanvien->cmnd = $req->cmnd;
    	$nhanvien->diaChi = $req->diaChi;
    	$nhanvien->luong= $req->luong;
        $nhanvien->trangThai = 0;
        if($req->hinhDaiDien == null){//khong ton tai up link
                if($req->hasFile('file')){
                # code...
               // luu hinh anh
                $file = $req->file("file");
                $filename = $file->getClientOriginalName("file");
                $Hinh = str_random(4)."_".$filename;// lay ten hinh
                $file->storeAs(
                    'upload/nhanvien',// vi tri luu
                    $Hinh
                );
                $nhanvien->hinhDaiDien = $Hinh;
            }
        }else{
            $nhanvien->hinhDaiDien = $req->hinhDaiDien;
        }
        $nhanvien->save();
        /** tao quyen mac dinh **/
        $phanquyen = new Phanquyen();
        $phanquyen->username = $req->username;
        $phanquyen->quanly = 0;
        $phanquyen->phucvu = 0;
        $phanquyen->daubep = 0;
        $phanquyen->save();
        return redirect()->back()->with("thanhcong","Thêm thông tin nhân viên thành công ");
    }
    // lay thong tin username 
    public function getUsername(Request $req){
    	$data = Nhanvien::where('username','=',$req->username)->get();
        return response()->json(['data'=>$data]);// tra ve du lieu json
    }
    // show giao dien sua nhan vien
    public function suaNhanSu($username){
    	// lay thong tin nhan vien
    	$nhanvien = Nhanvien::where('username','=',$username)->get();
    	return view("admin.nhansu.sua",compact('nhanvien'));
    }
    public function sendSuaNhanSu(Request $req){
    	// check form khi du lieu duoc gui len
    	$this->validate($req,
    		[
         'username' => 'required',        
         ],
         [
         'username.unique' => 'Không tồn tại username'
         ]);
    	$nhanvien =Nhanvien::where('username','=',$req->username)->first();

    	$nhanvien->ho = $req->ho;
    	$nhanvien->ten = $req->ten;
    	if($req->password != ""){
    		$nhanvien->password = Hash::make($req->password);
    	}
    	$nhanvien->ngaySinh = $req->ngaySinh;
    	$nhanvien->gioiTinh = $req->gioiTinh;
    	$nhanvien->sdt= $req->sdt;
    	$nhanvien->cmnd = $req->cmnd;
    	$nhanvien->diaChi = $req->diaChi;
    	$nhanvien->luong= $req->luong;
        $nhanvien->trangThai = $req->trangThai;
    	if($req->hinhDaiDien == null){//khong ton tai up link
            if($req->hasFile('file')){
                # code...
               // luu hinh anh
                // cap nhat hinh anh tim thay thi xoa hinh va them lai hinh moi
                if($nhanvien->hinhDaiDien != null){
                    while(file_exists('storage/app/upload/nhanvien/'.$nhanvien->hinhDaiDien)){
                        unlink('storage/app/upload/nhanvien/'.$nhanvien->hinhDaiDien);
                    }
                }
                $file = $req->file("file");
                $filename = $file->getClientOriginalName("file");
                $Hinh = str_random(4)."_".$filename;// lay ten hinh
                $file->storeAs(
                    'upload/nhanvien',// vi tri luu
                    $Hinh
                );
                $nhanvien->hinhDaiDien = $Hinh;
            }
        }else{
            $nhanvien->hinhDaiDien = $req->hinhDaiDien;
        }   
        //luu va thong bao
        $nhanvien->save(['key' => 'username']);
         return redirect()->back()->with("thanhcong","Cập nhật thông tin nhân viên thành công ");
    }
    /***Xoa nhan vien
		* bien dau vao username khoa chinh
     */
    public function xoaNhanSu($username){
       $nhanvien = Nhanvien::where('username','=',$username)->first();
       $nhanvien->delete();
       return redirect()->back()->with("thanhcong","Xoá thông tin nhân viên thành công");
    }
    /*** Nhan du lieu cho viec cap quyen **/
    public function capQuyen(Request $req){
        $phanquyen = Phanquyen::where("username","=",$req->ten)->first();
        $quyen = $req->quyen;
        if($quyen == 2){
            // truong hop admin khong muon cap quyen hien tai
            $phanquyen->quanly = 0;
            $phanquyen->phucvu = 0;
            $phanquyen->daubep = 0;
        }else if($quyen == -1){
            // truong hop la admin
            $phanquyen->quanly = 1;
            $phanquyen->phucvu = 0;
            $phanquyen->daubep = 0;
        }else if($quyen == 0){
            // truong hop la phuc vu
            $phanquyen->quanly = 0;
            $phanquyen->phucvu = 1;
            $phanquyen->daubep = 0;
        }else{
            // truong hop la daubep
            $phanquyen->quanly = 0;
            $phanquyen->phucvu = 0;
            $phanquyen->daubep = 1;
        }
        $phanquyen->save();
        return response()->json(['success'=>'Cập nhật quyền cho nhân viên thành công']);// tra ve du lieu json
    }
    /* CAP NHAT TRANG THAI NHAN SU  **/ 
    public function capNhapTrangThai($username){
        $nhanvien = Nhanvien::where('username','=',$username)->first();
        if($nhanvien->trangThai == 1){
            $nhanvien->trangThai = 0;
        }else{
            $nhanvien->trangThai = 1;
        }
        $nhanvien->save();
        return response()->json(['success'=>'Cập nhật trạng thái cho nhân viên thành công']);// tra ve du lieu json
    }
}
