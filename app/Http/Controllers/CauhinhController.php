<?php

namespace App\Http\Controllers;
use App\Cauhinh;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class CauhinhController extends Controller
{
    public function getCauHinh(){
        $cauhinh = Cauhinh::first();
        return view("admin.cauhinh.cauhinh",compact("cauhinh"));
    }
    public function sendCauHinh(Request $req, $id){
        $cauhinh = Cauhinh::find($id);
        $cauhinh->maugiaodien = $req->maugiaodien;
        $cauhinh->lienhe = $req->lienhe;
        $cauhinh->diachi=  $req->diachi;
        $cauhinh->footer= $req->footer;
        if($req->logo == null){//khong ton tai up link
            if($req->hasFile('file')){
                # code...
               // luu hinh anh
                // cap nhat hinh anh tim thay thi xoa hinh va them lai hinh moi
                while(file_exists('storage/app/logo/'.$cauhinh->logo)){
                    unlink('storage/app/logo/'.$cauhinh->logo);   
                }
                $file = $req->file("file");
                $filename = $file->getClientOriginalName("file");
                $Hinh = str_random(4)."_".$filename;// lay ten hinh
                $file->storeAs(
                    'logo/',// vi tri luu
                    $Hinh
                );
                $cauhinh->logo = $Hinh;
            }
        }else{
            $cauhinh->logo = $req->logo;
        }
        $cauhinh->save();
        return redirect()->back()->with("thanhcong","Cập nhật thông tin cho cấu hình trang chủ thành công ");
    }
}
