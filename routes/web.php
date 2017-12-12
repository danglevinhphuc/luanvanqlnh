<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/** FILE NOT FOUND **/

/** ROUTE CLIENT **/
Route::get("/",['as'=>'trangchuclient','uses'=>'ClientController@trangChu']);
Route::post('/mon-an-theo-loai',['as'=>'monantheoloai','uses'=>'ClientController@getMonAnTheoLoai']);
Route::get('/danh-muc/{ten}',['as'=>'monantheodanhmuc','uses'=>'ClientController@getMonAnTheoDanhMuc']);
Route::get('/chi-tiet-mon-an/{ten}',['as'=>'chitietmonan','uses'=>'ClientController@getChiTiet']);
Route::get('/xem-su-kien',['as'=>'xemsukien','uses'=>'ClientController@getSuKien']);
Route::get('/tim-mon-an',['as'=>'timmonan','uses'=>'ClientController@getTim']);
Route::get('/ban-an',['as'=>'showbanan','uses'=>'ClientController@getBanAn'])->middleware('phucvu');
Route::get('/chon-mon',['as'=>'showchonmon','uses'=>'ClientController@getChonMon']);
Route::get("/lay-mon-an",['as'=>'laymonan','uses'=>'ClientController@getMonAnAjax']);
Route::post("/them-mon-thanh-toan",['as'=>'themonvaothanhtoan','uses'=>'ClientController@addItemThanhToanAjax']);
Route::get("/dang-nhap",['as'=>'dangnhap','uses'=>'ClientController@dangNhap']);
Route::post("/authenticate",['as'=>'authenticate','uses'=>'ClientController@Authenticate']);
Route::get("/dang-xuat",['as'=>'dangxuat','uses'=>'ClientController@dangXuat']);
/***END ĐIỀU HƯỚNG ADMIN**/
/** ROUTE ADMIN OR DRASHBOARD **/
Route::group(['prefix'=>'admin','middleware'=>'daubep'],function(){
	Route::get('trangchu',['as'=>'trangchuadmin','uses'=>'AdminController@getDanhsach'])->middleware('admin');
	Route::get('cauhinh',['as'=>'cauhinh','uses'=>'CauhinhController@getCauHinh'])->middleware('admin');
	Route::post('sendcauhinh/{id}',['as'=>'sendcauhinh','uses'=>'CauhinhController@sendCauHinh'])->middleware('admin');
	Route::group(['prefix'=>'nhansu','middleware'=>'admin'],function(){
		//admin/nhansu/danhsach
		Route::get('danhsach',['as'=>'danhsachnhansu','uses'=>'NhansuController@getDanhsach']);
		//admin/nhansu/them
		Route::get('them',['as'=>'themnhansu','uses'=>
			"NhansuController@themNhanSu"]);
		//admin/nhansu/sua/{id}
		Route::get('suanhanvien/{username}',['as'=>'suanhansu','uses'=>
			"NhansuController@suaNhanSu"]);
		// post sua nhan su
		Route::post('suanhanvien',['as'=>'suanhansu','uses'=>
			"NhansuController@sendSuaNhanSu"]);
		// post them nhan su
		Route::post('nhansu',['as'=>'sendthemnhansu','uses'=>
			"NhansuController@sendThemNhanSu"]);
		// get username su dung ajax
		Route::post("getusername",['as'=>'getusername','uses'=>
			"NhansuController@getUsername"]);
		// delete nhan vien qua username
		Route::get("xoanhanvien/{username}",['as'=>'xoanhansu','uses'=>
			"NhansuController@xoaNhanSu"]);
		// cap quyen cho nhan vien
		// post 
		Route::post("capquyen",['as'=>'capquyen','uses'=>
			"NhansuController@capQuyen"]);
		// cap nhat lai trang thai su dung bang ajax
		Route::get("capnhattrangthainhansu/{username}",['as'=>'capnhattrangthainhansu','uses'=>
			"NhansuController@capNhapTrangThai"]);
	});
	Route::group(['prefix'=>'khachhang','middleware'=>'admin'],function(){
		//admin/khachhang/danhsach
		Route::get('danhsach',['as'=>'danhsachkhachhang','uses'=>'KhachhangController@getDanhsach']);
		//admin/khachhang/them
		Route::get('them',['as'=>'themkhachhang','uses'=>
			"KhachhangController@themKhachHang"]);
		//admin/khachhang/sua/{id}
		Route::get('suakhachhang/{username}',['as'=>'suakhachhang','uses'=>
			"KhachhangController@suaKhachHang"]);
		// post sua khachhang
		Route::post('suakhachhang',['as'=>'sendsuakhachhang','uses'=>
			"KhachhangController@sendSuaKhachHang"]);
		// post them khachhang
		Route::post('khachhang',['as'=>'sendthemkhachhang','uses'=>
			"KhachhangController@sendThemKhachHang"]);
		// get username su dung ajax
		Route::post("getusername",['as'=>'getusernamekhach','uses'=>
			"KhachhangController@getUsername"]);
		// delete nhan vien qua username
		Route::get("xoakhachhang/{username}",['as'=>'xoakhachhang','uses'=>
			"KhachhangController@xoaKhachHang"]);
		// cap nhat lai trang thai su dung bang ajax
		Route::get("capnhattrangthaikhachhang/{username}",['as'=>'capnhattrangthaikhachang','uses'=>
			"KhachhangController@capNhapTrangThai"]);
	});
	Route::group(['prefix'=>'loaimon','middleware'=>'admin'],function(){
		//admin/loaimon/danhsach
		Route::get('danhsach',['as'=>'danhsachloaimon','uses'=>'LoaimonController@getDanhsach']);
		//admin/loaimon/them
		Route::get('them',['as'=>'themloaimon','uses'=>
			"LoaimonController@themLoaiMon"]);
		//admin/khachhang/sua/{id}
		Route::get('sualoaimon/{id}',['as'=>'sualoaimon','uses'=>
			"LoaimonController@suaLoaiMon"]);
		// post them loaimon
		Route::post('loaimon',['as'=>'sendthemloaimon','uses'=>
			"LoaimonController@sendThemLoaiMon"]);
		// post sua loaimon  
		Route::post('sualoaimon/{id}',['as'=>'sendsualoaimon','uses'=>
			"LoaimonController@sendSuaLoaiMon"]);
		// get ten loaimon su dung ajax
		Route::post("tenloaimon",['as'=>'tenloaimon','uses'=>
			"LoaimonController@getTenLoaiMon"]);
		// delete nhan vien qua id
		Route::get("xoaloaimon/{id}",['as'=>'xoaloaimon','uses'=>
			"LoaimonController@xoaLoaiMon"]);
	});
	Route::group(['prefix'=>'thucdon','middleware'=>'admin'],function(){
		//admin/thucdon/danhsach
		Route::get('danhsach',['as'=>'danhsachthucdon','uses'=>'MonanController@getDanhsach']);
		//admin/thucdon/them
		Route::get('them',['as'=>'themthucdon','uses'=>
			"MonanController@themMonAn"]);
		// post them mon an vao trong thuc don
		Route::post('monan',['as'=>'sendthemmonan','uses'=>
			"MonanController@sendThemMonAn"]);
		// get ten monan su dung ajax
		Route::post("tenmonan",['as'=>'tenmonan','uses'=>
			"MonanController@getTenMonAn"]);
		//admin/monan/sua/{id}
		Route::get('suamonan/{id}',['as'=>'suamonan','uses'=>
			"MonanController@suaMonAn"]);
		// post sua monan  
		Route::post('suamonan/{id}',['as'=>'sendsuamonan','uses'=>
			"MonanController@sendSuaMonAn"]);
		// delete nhan vien qua id
		Route::get("xoamonan/{id}",['as'=>'xoamonan','uses'=>
			"MonanController@xoaMonAn"]);
		// cap nhat lai trang thai su dung bang ajax
		Route::get("capnhattrangthaimonan/{id}",['as'=>'capnhattrangthaimonan','uses'=>
			"MonanController@capNhapTrangThai"]);
	});
	Route::group(['prefix'=>'banan','middleware'=>'admin'],function(){
		//admin/banan/danhsach
		Route::get('danhsach',['as'=>'danhsachbanan','uses'=>'BananController@getDanhsach']);
		//admin/banan/them
		Route::get('them',['as'=>'thembanan','uses'=>
			"BananController@themBanAn"]);
		// post ban an trong thuc don
		Route::post('banan',['as'=>'sendthembanan','uses'=>
			"BananController@sendThemBanAn"]);
		// check exit ban co ton tai luc truoc hay khong
		Route::post("kiemtrabanan",['as'=>'sendkiemtrabanan','uses'=>
			"BananController@kiemTraBanTonTai"]);
		// delete ban an qua id
		Route::get("xoabanan/{id}",['as'=>'xoabanan','uses'=>
			"BananController@xoaBanAn"]);
		//admin/banan/sua/{id}
		Route::get('suabanan/{id}',['as'=>'suabanan','uses'=>
			"BananController@suaBanAn"]);
		// post sua banan
		Route::post('suabanan/{id}',['as'=>'sendsuabanan','uses'=>
			"BananController@sendSuaBanAn"]);
		// cap nhat lai trang thai su dung bang ajax
		Route::get("capnhattrangthaibanan/{id}",['as'=>'capnhattrangthaibanan','uses'=>
			"BananController@capNhapTrangThai"]);
	});
	Route::group(['prefix'=>'sukien','middleware'=>'admin'],function(){
		//admin/sukien/danhsach
		Route::get('danhsach',['as'=>'danhsachsukien','uses'=>'SukienController@getDanhsach']);
		//admin/sukien/them
		Route::get('them',['as'=>'themsukien','uses'=>
			"SukienController@themSukien"]);
		// post sukien trong su kien
		Route::post('sukien',['as'=>'sendthemsukien','uses'=>
			"SukienController@sendThemSuKien"]);
		// post sua banan
		Route::post('suasukien/{id}',['as'=>'sendsuasukien','uses'=>
			"SukienController@sendSuaSuKien"]);
		//admin/sukien/sua/{id}
		Route::get('suasukien/{id}',['as'=>'suasukien','uses'=>
			"SukienController@suaSuKien"]);
		// delete ban an qua id
		Route::get("xoasukien/{id}",['as'=>'xoasukien','uses'=>
			"SukienController@xoaSuKien"]);
	});
	Route::group(['prefix'=>'congviec','middleware'=>'daubep'],function(){
		//admin/congviec/daubep
		Route::get('daubep',['as'=>'daubep','uses'=>'CongviecController@getDauBep']);
		//admin/congviec/phucvu
		Route::get('phucvu',['as'=>'phucvu','uses'=>'CongviecController@getPhucVu']);
		//admin/congviec/thanhtoan
		Route::get('thanhtoan',['as'=>'thanhtoan','uses'=>'CongviecController@getThanhToan'])->middleware('admin');
		Route::post('cap-nhat-thanh-toan',['as'=>'capnhatthanhtoan','uses'=>'CongviecController@updateThanhToan'])->middleware('admin');
		Route::post("xem-thanh-toan",['as'=>'xemthanhtoan','uses'=>'CongviecController@postThanhToanAjax'])->middleware('admin');
		Route::post("tai-khoan-vip",['as'=>'taikhoanvip','uses'=>'CongviecController@postTkVipAjax'])->middleware('admin');
		Route::get('in-hoa-don/{id}/{theloai}',['as'=>'inhoadon','uses'=>'CongviecController@getInHoaDon'])->middleware('admin');
	});
});
/**END ROUTE ADMIN OR DRASHBOARD **/