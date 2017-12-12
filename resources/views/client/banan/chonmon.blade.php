@extends('client.banan.index')
@section('title')Chọn món ăn | Nhà hàng FOOD
@endsection
@section('content')
<style type="text/css">
#mon-an-display{
	background: url('{{ asset("public") }}/client/img/galaxy.jpg') no-repeat  right top;
	display: none;
}
.menu-order{
	background: url('{{ asset("public") }}/client/img/item.jpg')top;
	margin-bottom: 15px;
	color: #fff;
	position: relative;
	height: 120px;
}
.menu-tenmon{
	font-size: 30px;
	font-weight: bold;
	margin-left:10%;
}
.menu-mota{
	font-size: 20px;
	color: #000;
}
.gia-mon{
	margin-left:10% !important;
}
.menu-hinh img{
	display: inline-block;
	float: right;
	margin-top: 00px;
}
.menu-gia{
	font-size: 30px;
}
.checkbox {
	width: 20px;
	height: 20px;
	float: right;
	opacity: 0;
}
.flexslider{
	background-color: rgba(255, 0, 0, 0);
}
.goi-mon-table{
	margin-left: 1200px;
	margin-top: -500px;
	position: fixed;		
}
.chooseitem{
	cursor: pointer;
}
.nums-choose {
	height: 40px;
	position: relative;
	margin: 10px auto;
}
#product_quantity{
	text-align: center;
	width: 20%;
	display: inline-block
}
.updateSoLuong{
	text-align: center;
	width: 40%;
	display: inline-block	
}
th{
	text-align: center;
}
.danger{
	color: red;
	font-size: 25px;
	cursor: pointer;
}
.goi-mon-mobile{
	display: none;
	cursor: pointer;
}
@media screen and (max-width:860px){
	.goi-mon-mobile{
		display: block;
		margin: 0 auto;
	}
	.goi-mon-table{
		display: none;
	}
}
@media screen and (max-width:650px){
	.menu-tenmon,.gia-mon{
		font-size: 17px;
	}
	.gia-mon{
		margin-bottom: 30px !important;
	}
}
@media screen and (max-width:400px){
	.menu-tenmon,.gia-mon{
		font-size: 17px;
	}
	.gia-mon{
		margin-bottom: 30px !important;
	}
	.menu-hinh img{
		margin-top: -25px !important;
		z-index: -1000;
	}
	.button-max{
		width: 100%;
	}

}
</style>
<div class="container" style="position: absolute; top: 50%;left: 50%;transform: translate(-50%, -50%);">
	<div class="banner">
		<div class="banner-left"></div>
		<div class="banner-right"></div>
	</div>
</div>
<div id="mon-an-display">

	<div class="flex-container container">
		<button class="btn btn-warning btn-lg goi-mon goi-mon-mobile">Gọi món</button>
		<div class="alert" style="display: none">
		</div>
		<div class="flexslider">
			<ul class="slides">
				@foreach($loaimon as $loaimon)
				<li >
					<h3 style="text-align:center;font-weight:bold;font-size:40px;color: #003300">{{$loaimon->loaiMon}}</h3>
					@foreach($monanshow as $monan)
					@if($loaimon->idLoaiMon == $monan->idLoaiMon)
					<div class="menu-order chooseitem" tenmonkhongdau="{{$monan->tenMonAnKhongDau}}" tenmon="{{$monan->tenMonAn}}" id="delete-{{$monan->tenMonAnKhongDau}}"><span class="menu-tenmon">{{$monan->tenMonAn}}</span><p class="gia-mon">{{number_format($monan->giaMonAn)}} VNĐ / {{$loaimon->trangThai}}</p><span class="menu-gia"></span><span class="menu-hinh">
						@if(strpos($monan->hinhAnhMonAn, 'http') !== false)
						<img src='{{$monan->hinhAnhMonAn}}' style="width: 200px !important; height: 120px !important">
						@else
						<img src='storage/app/upload/monan/{{$monan->hinhAnhMonAn}}' style="width: 200px !important; height: 120px !important">
						@endif
					</span>
				</div>
				@endif
				@endforeach
			</li>
			@endforeach
		</ul>
	</div>
</div>
<button class="btn btn-warning btn-lg goi-mon goi-mon-table">Gọi món</button>
<button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#thoat-ban">Thoát</button>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header btn-info">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Chọn số lượng cho món : <span id="monanchon"></span></h4>
			</div>
			<div class="modal-body">
				<div class="nums-choose fleft" style="text-align: center;">
					<input type="button" class="btn btn-default" value="-" id="tru">
					<input type="number" id="product_quantity" min="1" name="quantity" value="1" title="Qty" class="form-control" size="4">
					<input type="button" class="btn btn-default" value="+" id="cong">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="dong-y" data-dismiss="modal">Đồng ý</button>
				<button type="button" class="btn btn-danger" id="huy-bo" data-dismiss="modal">Huỷ bỏ</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<div id="myModal1" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header btn-info">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Danh Sách Món Đã Gọi </h4>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered table-hover text-center">
					<thead>
						<tr >
							<th>STT</th>
							<th>Tên</th>
							<th>Cập nhật</th>
							<th>Xoá</th>
						</tr>
					</thead>
					<tbody id="load-danh-sach"></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary button-max" id="dong-y-goi-mon" data-dismiss="modal">Đồng ý gọi món</button>
				<button type="button" class="btn btn-danger button-max" id="huy-bo-goi-mon" data-dismiss="modal">Huỷ bỏ danh sách này</button>
				<button type="button" class="btn btn-default button-max" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<div id="thoat-ban" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bạn có muốn thoát ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" id="dong-y-thoat">Đồng ý</button>
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Không</button>
      </div>
    </div>

  </div>
</div>
</div>
@endsection
@section('headlink')
<link rel='stylesheet' id='ap-front-styles-css'  href='{{ asset("public") }}/client/css/loader.css' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href='{{ asset("public") }}/client/css/slick.css'/>
<script type="text/javascript" src='{{ asset("public") }}/client/js/slick.js'></script>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		if(localStorage.getItem("maban") !== null){
			/*** LOADER **/
			setTimeout(function(){
				 	$("#mon-an-display").show();// hien ban thong tin ve mon an 
					$(".banner").hide();// an loader 
				}, 100);
		}else{
			window.location.href = "{{route('showbanan')}}";
		}
		/*** CONG & TRU CHO SO LUONG **/
		$("#cong").on('click',function(){
			var valueQuality = $("#product_quantity").val();
			var dataCong = valueQuality++;
			$("#product_quantity").val(valueQuality++);// gan du lieu tang 1
		});
		$("#tru").on("click",function(){
			var valueQuality = $("#product_quantity").val();
			var dataTru = valueQuality--;
			if(dataTru > 1){// truong hop nho hon 1
				$("#product_quantity").val(1);// gan du lieu giam 1
			}
		});
		/* TRUONG HOP NHAP SO NHO HON 0 ***/
		$("#product_quantity").on("keyup",function(){
			let  value = $(this).val();
			if(value < 0){
				alert("Bạn phải nhập lớn hơn 1");
				$(this).val(1);
			}
		});
	});
</script>
<script>
	$(document).ready(function () {
		$('.flexslider').flexslider({
			animation: 'fade',
			controlsContainer: '.flexslider'
		});
	});
</script>
<script type="text/javascript">
	/*** CODE CLICK CHON MON **/
	var dataMonAn = [];
	var arrayTenMonKhongDau = []; // mang luu lai mon da chon
	var arraySoLuongTheoMon = []; // luu so luong theo mon mac dinh la 1
	var socket = io.connect("http://localhost:3000/");
	$(document).ready(function(){
		/*** LOAD MON AN **/
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});
		/*** GOI AJAX ĐE LAY DANH SACH **/
		$.get("{{route('laymonan')}}" ,data=>{
			dataMonAn = data.data;
		});/***END LOAD MON AN **/
		$(".chooseitem").on('click',function(){
			var data=  $(this);
			var tenMon = data.attr("tenmon");// lay ten mon co dau
			var tenMonKhongDau = data.attr('tenmonkhongdau');
			// lay vi tri cua mon an khong dau
			var viTriCanLaySoLuong = arrayTenMonKhongDau.indexOf(tenMonKhongDau);
			// kiem tra neu ton tai thi gan vao input
			if(viTriCanLaySoLuong != -1){
				$("#product_quantity").val(arraySoLuongTheoMon[viTriCanLaySoLuong]);
			}else{
				$("#product_quantity").val(1);
			}
			$('#myModal').modal('show');// show text chon so luong san pham
			$("#monanchon").text(tenMon);//gan ten
			localStorage.setItem("tenMonAn",tenMonKhongDau);
		});
		chonSoLuong();
	});
	function constructAlert(info, classAlert){
		$("html, body").animate({ scrollTop: 0 }, "slow");
		$(".alert").html(info);
		$(".alert").fadeIn();
		$(".alert").addClass(classAlert);
		setTimeout(function(){
			$(".alert").fadeOut();
			$(".alert").removeClass(classAlert);
		},5000);
	}
	function chonSoLuong(){
		// them so luong va ten mon an
		$("#dong-y").on('click',function(){
			setTimeout(function(){
				if(localStorage.getItem("tenMonAn")){// kim tra ten co ton tai hay k
					var soluong = $("#product_quantity").val();
					var tenMonAnKhongDauKiemTra = localStorage.getItem("tenMonAn");
					var viTriKiemTra =arrayTenMonKhongDau.indexOf(tenMonAnKhongDauKiemTra); // tra ve vi tri trong mang
					// dua du lieu vao
					/*** KIEM TRA CO TRONG MANG KHONG NEU CO THI GAN GIA TRI MOI **/
					if(viTriKiemTra != -1){
						// truong hop ton tai
						// gan lai vi tri voi soluong moi
						arraySoLuongTheoMon[viTriKiemTra] = soluong;
					}else{
						// truong hop khong ton tai
						// them vao mang moi gom ten va so luong
						arrayTenMonKhongDau.push(tenMonAnKhongDauKiemTra);
						arraySoLuongTheoMon.push(soluong);
					}
					$("#product_quantity").val(1);// reset lai sl ve 1
					$('#delete-'+localStorage.getItem("tenMonAn")).css('box-shadow','1px 1px 3px 3px'); // hieu ung khi xac nhan chon
				}
			}, 100);
		});/***END DONG Y  ***/
		// XOA MON AN VA SO LUONG DA CHON
		$("#huy-bo").on('click',function(){
			setTimeout(function(){
				if(localStorage.getItem("tenMonAn")){// kim tra ten co ton tai hay k
					var soluong = $("#product_quantity").val();
					// dua du lieu vao
					var viTriCanXoa = arrayTenMonKhongDau.indexOf(localStorage.getItem("tenMonAn"));
					if(viTriCanXoa != -1){
						// xac nhan muon xoa
						if(confirm("Bạn có muốn huỷ bỏ món ăn này không")){
							// xoa ten va so luong
							arrayTenMonKhongDau.splice(viTriCanXoa,1);
							arraySoLuongTheoMon.splice(viTriCanXoa,1);
							// tat hieu ung mau khi mon an da chon
							$('#delete-'+localStorage.getItem("tenMonAn")).css('box-shadow','none');
						}
					}
					$("#product_quantity").val(1);// reset lai sl ve 1
				}
			}, 100);
		});/****END HUY BO */
		/** KHI CHON MON AN THI LAY DANH SACH MON AN DA LOAD VA DANH SACH GOI DE SO SANH **/
		let dataShowDanhSachTenGoiMon = [];
		$(".goi-mon").on('click',function(){
			dataShowDanhSachTenGoiMon = [];
			for(let i = 0 ; i < arrayTenMonKhongDau.length ; i++){
				for(let j = 0 ; j < dataMonAn.length ;j++){
					if(arrayTenMonKhongDau[i] == dataMonAn[j].tenMonAnKhongDau){
						dataShowDanhSachTenGoiMon.push(dataMonAn[j].tenMonAn)
					}
				}
			}
			/** KIM TRA TON TAI GIA TRI  **/
			if(dataShowDanhSachTenGoiMon.length > 0){
				let html = "" ; // tao bien luu de show ra html 
				/** TAO VONG LAP DE XUAT TAT CA GIA TRI **/
				for(let i = 0 ; i < dataShowDanhSachTenGoiMon.length ; i++){
					html = html + "<tr><td>"+parseInt(i+1)+"</td><td>"+dataShowDanhSachTenGoiMon[i]+"</td><td><input type='number' class='form-control updateSoLuong' id='' name="+arrayTenMonKhongDau[i] +" min = '1' value="+arraySoLuongTheoMon[i]+" /></td><td><i class='fa fa-ban danger' id='delete-mon-an' name='"+dataShowDanhSachTenGoiMon[i]+"' namekhongdau="+arrayTenMonKhongDau[i] +" aria-hidden='true'></i></td></tr>";
				}
				$('#myModal1').modal('show');// show text chon so luong san pham
				$("#load-danh-sach").html(html);
			}else{
				constructAlert("Chưa có món ăn nào","alert-danger");
			}
		});
		/*** HUY DANH SACH GOI MON ***/
		$("#huy-bo-goi-mon").on('click',function(){
			/*** RESET LAI BIEN VA BOX HIEN THI */
			if(confirm("Xác nhận huỷ bỏ danh sách")){
				dataShowDanhSachTenGoiMon = [];// xoa bien show
				arraySoLuongTheoMon = [];// xoa mang so luong
				arrayTenMonKhongDau= [];// xoa mang ten
				$(".chooseitem").css("box-shadow","none");// tat hieu ung show
				$("#load-danh-sach").html();// tat danh sach
					constructAlert("Huỷ danh sách thành công","alert-success");// thong bao
				}
		});/***END Huy Danh sach **/
		// xoa danh sach 
		$(document).on('click','#delete-mon-an',function(){
			let nameXoa = $(this).attr("name");// lay ten xoa
			if(confirm("Bạn có muốn xoá món ăn: "+nameXoa+" không ???")){
				let dataTenKhongDau = $(this).attr("namekhongdau");// lay ten xoa khong dau
				let viTriCanXoa = arrayTenMonKhongDau.indexOf(dataTenKhongDau);
				arraySoLuongTheoMon.splice(viTriCanXoa,1);// xoa so luong 
				arrayTenMonKhongDau.splice(viTriCanXoa,1);// xoa ten
				// cap lai hieu ung
				$("#delete-"+dataTenKhongDau).css("box-shadow","none");
			$('#myModal1').modal('hide');// an text chon so luong san pham
			constructAlert("Xoá món ăn: "+nameXoa+" thành công","alert-success");// thong bao
		}
	}); 
		// cap nhat lai danh sach
		$(document).on('keyup','.updateSoLuong',function(){
			let dataSoluong = $(this).val();// lay so luong
			if(dataSoluong < 1 && dataSoluong != ""){
				alert("Bạn phải nhập số lượng lớn hơn 1");
				$(this).val(1);
			}else if(dataSoluong > 1 && dataSoluong != ""){
				let dataTenKhongDau = $(this).attr("name");// lay ten khong dau
				//xac dinh vi tri
				let viTriCanCapNhat = arrayTenMonKhongDau.indexOf(dataTenKhongDau);
				// cap nhat lai
				arraySoLuongTheoMon[viTriCanCapNhat] = dataSoluong;
			}
		}); 
		/***XAC NHAN GOI MON ***/
		$("#dong-y-goi-mon").on('click',function(){
			if(confirm("Bạn có muốn gọi món với danh sách này ???")){
				// gui du lieu de server
				let data = {
					"soluong" : arraySoLuongTheoMon,
					"tenmonkhongdau" : arrayTenMonKhongDau,
					"tenmoncodau" : dataShowDanhSachTenGoiMon,
					"maban" : localStorage.getItem("maban"),
					"tenban":localStorage.getItem("tenban")
				};
				$.ajaxSetup({
                  	headers: {
                    	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                	}
                });
                $.post("{{route('themonvaothanhtoan')}}",data,data=>{});
				socket.emit("send item from client",data);
				/** RESET LAI BIEN SO LUONG TEN MON DANH SACH **/
				dataShowDanhSachTenGoiMon = [];// xoa bien show
				arraySoLuongTheoMon = [];// xoa mang so luong
				arrayTenMonKhongDau= [];// xoa mang ten
				$(".chooseitem").css("box-shadow","none");// tat hieu ung show
				$("#load-danh-sach").html();// tat danh sach
		}
	});
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#dong-y-thoat").on('click',function(){
			let maBan = localStorage.getItem("maban");
			localStorage.removeItem("maban");
			localStorage.removeItem("tenban");
			socket.emit("send exit from client",maBan);
			window.location.href= "{{route('showbanan')}}";
		});
	});
</script>
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection