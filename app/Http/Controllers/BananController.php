<?php

namespace App\Http\Controllers;
use App\Banan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class BananController extends Controller
{
    // lay danh sach loai mon an & uong dua ra 
    public function getDanhsach(){
    	$banan = Banan::all();
    	return view("admin.banan.danhsach",compact('banan'));
    }
    // show giao dien them ban an
    public function themBanAn(){
    	return view("admin.banan.them");	
    }
    // gui du lieu tu form cho viec them vao 
    public function sendThemBanAn(Request $req){
        // kiem tra form chekc validation
        $this->validate($req,
            [
         'tenBan' => 'required'
         ],
         [
         'tenBan.required' => 'Bạn chưa nhập tên bàn'
         ]);
        // kiem tra so luong ban an can phai cai 
        $checkBanAn = Banan::count();
        if($checkBanAn){
            $banAnDelete = Banan::all();
            // tao vong lap de duyet du lieu tra ve idMaBan
            foreach ($banAnDelete as $key => $value) {
                # code...
                $id = $banAnDelete[$key]->maBan;
                $banan = Banan::find($id);// xoa ban theo id
                $banan->delete();
            }
        }
        if($req->soluong > 0){
            $soLuong= $req->soluong;// lay so luong de tao vong lap
            for($i =0 ;$i < $soLuong ; $i++){
                $banan = new Banan();
                $tenBan = changeTitle($req->tenBan);// chuan hoa ten ban
                $banan->tenBan = $tenBan.($i+1);
                $banan->trangThai = 1;
                $banan->save();
            }
            return redirect()->back()->with("thanhcong","Thêm thông tin bàn thành công ");
        }
    }
    // show giao dien sua ban an
    public function suaBanAn($id){
        $banan = Banan::find($id);// xoa ban theo id
        return view("admin.banan.sua",compact('banan'));
    }
    // gui nhan du lieu tu sua ban an
    // 2 tham so truyen vao 
    public function sendSuaBanAn(Request $req, $id){
        $this->validate($req,
            [
         'tenBan' => 'required'
         ],
         [
         'tenBan.required' => 'Bạn chưa nhập tên bàn'
         ]);
        $banan = Banan::find($id);
        $banan->tenBan= changeTitle($req->tenBan);
        $banan->trangThai = $req->trangThai;
        $banan->save();
        return redirect()->back()->with("thanhcong","Cập nhật thông tin bàn thành công ");
    }
    // kiem tra ban ban dau co ton tai hay khong 
    public function kiemTraBanTonTai(Request $req){
        $data = Banan::where('tenBan','=',$req->tenBan)->get();
        return response()->json(['data'=>$data]);// tra ve du lieu json
    }
    // ham xoa table 
    public function xoaBanAn($id){
        $banan = Banan::find($id);
        $banan->delete();
        return redirect()->back()->with("thanhcong","Xoá bàn ăn thành công");
    }
    /* CAP NHAT TRANG THAI Khach HANG  **/ 
    public function capNhapTrangThai($id){
        $banan = Banan::find($id);
        if($banan->trangThai == 1){
            $banan->trangThai = 0;
        }else{
            $banan->trangThai = 1;
        }
        $banan->save();
        return response()->json(['success'=>'Cập nhật trạng thái cho bàn ăn thành công']);// tra ve du lieu json
    }
}
