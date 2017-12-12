<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Monan;
use App\Loaimon;
use App\Sukien;
use App\Banan;
use App\Thanhtoan;
use App\Nhanvien;
use App\Phanquyen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ClientController extends Controller
{
    // lay danh sach loai mon an & uong dua ra 
    public function trangChu(){
        $monan = Monan::where("trangThai","=",0)->orderBy('idMonAn', 'asc')
        ->limit(16)->get();
        $loaimon = Loaimon::all();
        return view("client.page.trangchu",compact('monan','loaimon'));
    }
    public function getMonAnTheoLoai(Request $req){
        $idMonAn= $req->id;
        $monan = Monan::where([['idLoaiMon',"=",$idMonAn],["trangThai","=",0]])->orderBy('idMonAn', 'desc')
        ->limit(5)->get();
        foreach ($monan as $monan) {
            # code...
            if(strpos($monan->hinhAnhMonAn, 'http') !== false){
                echo '<li><a href="chi-tiet-mon-an/'.$monan->tenMonAnKhongDau.'"><img width="250" height="250" src="'.$monan->hinhAnhMonAn.'" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="" title="" ></a>';
            }else{
                echo '<li><a href="#"><img width="250" height="250" src="storage/app/upload/monan/'.$monan->hinhAnhMonAn.'" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="" title="" ></a>';
            }
            
            echo '<div class="title-section">
            <div class="article-wrap">
            <div class="article-category"><i class="fa fa-cutlery" aria-hidden="true"></i> <a href="#">'.$monan->tenMonAn.'</a>                         </div>
            </div> 
            </div></li>';
        }
    }
    /***LAY MON AN THEO DANH MUC MON AN SHOW TAT CA MON AN RA VA PHAN TRANG ***/
    public function getMonAnTheoDanhMuc($ten){
        $monanslide = Monan::where("trangThai","=",0)->get()->random(15);
        $monanrandom = Monan::where("trangThai","=",0)->get()->random(5);
        $loaimon = Loaimon::where("loaiMonKhongDau","=",$ten)->get();
        $idLoaiMon =  $loaimon[0]->idLoaiMon;
        $monan = Monan::where([['idLoaiMon',"=",$idLoaiMon],["trangThai","=",0]])->orderBy('idMonAn', 'desc')
        ->paginate(15);
        return view("client.page.danhmuc",compact('monan','loaimon','monanrandom','monanslide'));
    }
    /** LAY CHI TIET MON AN
        * Bien dau vao la ten cua mon an
    ***/
    public function getChiTiet($ten){
        $monanrandom = Monan::where("trangThai","=",0)->get()->random(5);
        $loaimon = Loaimon::all()->random(5);
        $chitietmon = Monan::where("tenMonAnKhongDau","=",$ten)->get();
        return view("client.page.chitiet",compact('chitietmon','monanrandom','loaimon'));
    }
    /***
        Show giao dien su kien cho nguoi dung xem
     **/
        public function getSuKien(){
            $today =date("Y-m-d");
            $monanrandom = Monan::where("trangThai","=",0)->get()->random(5);
            $sukien = Sukien::where("thoiGianBatDau","<=",$today)->orderBy('idSuKien', 'desc')
            ->paginate(15);
            return view("client.page.sukien",compact('sukien','monanrandom'));
        }
    /*** 
        Nhan du lieu tu tim mon an va show giao dien tim kiem ra san pham
    ***/
        public function getTim(){
        $value = $_GET['tim'];// lay gia tri tu url get
        if($value != ""){
            $monanslide = Monan::all()->random(15);
            $monanrandom = Monan::where("trangThai","=",0)->get()->random(5);
            // lay value tu database
            $monan = Monan::where([["tenMonAn","like","%".$value."%"],["trangThai","=",0]])->orderBy('idMonAn', 'desc')->paginate(15);
            return view("client.page.tim",compact('monan','monanrandom','monanslide'));
        }else{
            //tra ve trang vua search
            return redirect()->back();
        }
    }
    /** 
        Show giao dien ban an
    ***/
        public function getBanAn(){
            $banan = Banan::where("trangThai","=",1)->get();
            return view("client.banan.chonban",compact("banan"));
        }
        /*** SHOW giao dien chon món ***/
        public function getChonMon(){
            $loaimon = Loaimon::all();
        $monanshow = Monan::where("trangThai","=",0)->get();// lay tat ca mon an
        return view("client.banan.chonmon",compact("loaimon","monanshow"));   
    }
    /*** GET DATA MONAN **/
    public function getMonAnAjax(){
        $monanshow = Monan::select('tenMonAn', 'tenMonAnKhongDau')->where("trangThai","=",0)->get();// lay tat ca mon an
        return response()->json(['data'=>$monanshow]);// tra ve du lieu json
    }
    /*** GET DATA DE THEM VAO CSDL THANH TOAN **/
    public function addItemThanhToanAjax(Request $req){
        $tenBan = $req->tenban;// lay ten ban
        $maBan = $req->maban;// lay ma ban
        $today =date("Y-m-d"); // thoi gian hien tai
        for($i  =0 ; $i < count($req->soluong) ; $i++){
            $tenMonAnCoDau = $req->tenmoncodau[$i];
            $tenMonAnKhongDau = $req->tenmonkhongdau[$i];// lay ten mon khong dau
            $soLuong = $req->soluong[$i];
            // lay gia cua mon an
            $monan = Monan::where('tenMonAnKhongDau','=',$tenMonAnKhongDau)->first();
            $giaMonAn = $monan->giaMonAn;
            /** Them vao thanh toan **/
            $thanhtoan = new Thanhtoan();
            $thanhtoan->tenMon = $tenMonAnCoDau;
            $thanhtoan->giaMonAn = $giaMonAn;
            $thanhtoan->soLuong = $soLuong;
            $thanhtoan->maBan = $maBan;
            $thanhtoan->trangThai = 0;// chua thanh toan
            $thanhtoan->ngayDat = $today;
            $thanhtoan->save();// luu lai thanh toan trong csdl
        }
        return response()->json(['data'=>"Thêm thành công"]);// tra ve du lieu json
    }
    /** SHOW GIAO DIEN DANG NHAP ***/
    public function dangNhap(){
        return view("login.login");   
    }
    /** xac thuc dang nhap **/
    public function Authenticate(Request $req){
        $this->validate($req,
            [
                'username' => 'required',
                'password'=>'required|min:5'
            ],
            [
                'username.required' => 'Bạn chưa nhập email',
                'password.required' => 'Mật khẩu bạn chưa nhập',
                'password.min' => 'Mật khẩu phải lớn hơn 5 ký tự'
            ]);
        $username = $req->username;
        $password= $req->password;
        // xac thuc tai khoan
        if(Auth::attempt(['username' => $username,'password'=>$password])){
            $username = Auth::user()->username;// lay username
            $quyen =  Phanquyen::where('username','=',$username)->first();
            if($quyen->quanly == 1){
                $giaoDien = 2;
            }else if($quyen->daubep == 1){
                $giaoDien = 1;
            }else if($quyen->phucvu == 1){
                $giaoDien = 0;
            }else{
                $giaoDien = -1;
            }
            session(['username' => $username]);// tao session login
            session(['giaodien' => $giaoDien]);// tao session cho menu admin
            return redirect()->route('trangchuclient');
        }else{
            return redirect()->back()->with("thanhcong","Đăng nhập thất bại");
        }
    }
    /**DANG XUAT **/
    public function dangxuat(Request $req){
        $req->session()->flush();
        return redirect()->route('dangnhap');
    }
}
