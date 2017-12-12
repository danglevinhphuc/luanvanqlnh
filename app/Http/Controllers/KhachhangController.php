<?php

namespace App\Http\Controllers;
use App\Khachhang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class KhachHangController extends Controller
{
    // lay danh sach khachhang dua ra 
    public function getDanhsach(){
    	$khachhang = Khachhang::all();
    	return view("admin.khachhang.danhsach",compact('khachhang'));
    }
    // show giao dien them khachhang
    public function themKhachHang(){
    	return view("admin.khachhang.them");	
    }
    // nhan du lieu thu form them nhan su
    public function sendThemKhachHang(Request $req){
    	// check form khi du lieu duoc gui len
    	$this->validate($req,
    		[
         'username' => 'unique:khachhang,username',
         'sdt' => 'unique:khachhang,sdt',
         'cmnd' =>'unique:khachhang,cmnd',
         ],
         [
         'username.unique' => 'Tài khoản đã tồn tại hãy chọn tài khoản khác',
         'sdt.unique' => 'Số điện thoại đã được sử dụng',
         'cmnd.unique' => 'Chứng minh nhân dân đã được sử dụng',
         ]);
    	$khachhang = new Khachhang();
        $khachhang->username = $req->username;
        $khachhang->hoTen = $req->hoTen;
        $khachhang->cmnd= $req->cmnd;
        $khachhang->sdt= $req->sdt;
        $khachhang->password = Hash::make($req->password);// ma hoa pass
        $khachhang->trangThai = 0;
        $khachhang->save();// luu vao csdl
        // thong bao ng dung
        return redirect()->back()->with("thanhcong","Thêm thông tin khách hàng thành công ");
    }
    // lay thong tin username 
    public function getUsername(Request $req){
    	$data = Khachhang::where('username','=',$req->username)->get();
        return response()->json(['data'=>$data]);// tra ve du lieu json
    }
    // show giao dien sua nhan vien
    public function suaKhachHang($username){
    	// lay thong tin nhan vien
    	$khachhang = Khachhang::where('username','=',$username)->get();
    	return view("admin.khachhang.sua",compact('khachhang'));
    }
    public function sendSuaKhachHang(Request $req){
    	// check form khi du lieu duoc gui len
    	$this->validate($req,
    		[
         'username' => 'required',        
         ],
         [
         'username.unique' => 'Không tồn tại username'
         ]);
    	$Khachhang =Khachhang::where('username','=',$req->username)->first();

        $Khachhang->hoTen = $req->hoTen;
        $Khachhang->cmnd= $req->cmnd;
        $Khachhang->sdt= $req->sdt;
        $Khachhang->trangThai = $req->trangThai;
    	if($req->password != ""){
    		$Khachhang->password = Hash::make($req->password);
    	}
        $Khachhang->save(['key' => 'username']);
         return redirect()->back()->with("thanhcong","Cập nhật thông tin khách hàng thành công ");
    }
    /***Xoa nhan vien
		* bien dau vao username khoa chinh
     */
    public function xoaKhachHang($username){
       $Khachhang = Khachhang::where('username','=',$username)->first();
       $Khachhang->delete();
       return redirect()->back()->with("thanhcong","Xoá thông tin khách hàng thành công");
    }
    /* CAP NHAT TRANG THAI Khach HANG  **/ 
    public function capNhapTrangThai($username){
        $khachhang = Khachhang::where('username','=',$username)->first();
        if($khachhang->trangThai == 1){
            $khachhang->trangThai = 0;
        }else{
            $khachhang->trangThai = 1;
        }
        $khachhang->save();
        return response()->json(['success'=>'Cập nhật trạng thái cho khách hàng thành công']);// tra ve du lieu json
    }
}
