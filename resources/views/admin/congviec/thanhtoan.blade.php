
@extends('admin.layout.index')
@section('content')
<style type="text/css">
.name-table {
	color: #339999;
	font-size: 30px;
	font-weight: bold;
	line-height: 35px;
	display: block;
	text-align: center;
}
.thumbnail{
	cursor: pointer;
}
.tablechoose{
	font-family: 'Open Sans';
	color: #EB8C79;
	background-color: #18506F;
	height: 100%;
}
#the-tin-dung{
	display: none;
}
.update-soluong {
	text-align: center;
	width: 50%;
	display: inline-block;
}
</style>
<div class="content-wrapper" style="min-height: 960px;">
	<div class="container">
		<div class="row">
			@foreach($banan as $banan)
			<div class="col-xs-6 col-md-3"  style="cursor: pointer;">
				<p class="thumbnail" maban='{{$banan->maBan}}' tenban='{{$banan->tenBan}}'>
					<span class="name-table">{{$banan->tenBan}}</span>
					<img src="{{ asset('public') }}/client/img/table.png" width="100px;" height="100px" alt="phuc4">
					<!-- Modal -->
				</p>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- Modal -->
<div id="thanhToan" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header btn-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title " >Danh sách món ăn & thức uống đã gọi</h4>
			</div>
			<div class="modal-body">
				<div id="thong-bao-cap-nhat"></div>
				<table class="table table-striped table-bordered table-hover text-center" id="khong-ton-tai">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody id="load-danh-sach"></tbody>
				</table>
				<h3>Tổng cộng: <span id="tong-cong"></span></h3>
				<div class="form-control" style="padding-bottom: 100px;" class="pull-right">
					<label class="btn-lg">Trực tiếp: </label><input type="radio" name="thanhtoan" value="0"  checked="true">
					<label class="btn-lg">Qua thẻ: </label><input type="radio" name="thanhtoan" value="1" >
					<label class="btn-lg">Sử dụng tài khoản VIP: </label><input type="checkbox"  id="tk-vip" ><br />
					<?php
					if(isset($sukien)){
						?>
						<label class="btn-lg">Sự kiện giảm: <span style="color: green;font-weight: bold;" giamgia="{{$sukien['phanTramGiamGia']}}" id="giam-gia">{{$sukien['phanTramGiamGia']}}%</span> => <span id="tonggiam"></span></label>
						<?php
					}
					?>
				</div>
			</div>
			<div class="modal-footer">
				<a id="co" class="btn btn-primary btn-lg"  >Thanh toán</a>
				<button type="button"  class="btn btn-danger btn-lg"  data-dismiss="modal">Không</button>
			</div>
		</div>
	</div>
</div>
<div id="vip" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header btn-warning">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Xác thực tài khoản VIP</h4>
			</div>
			<div class="modal-body">
				<div id="inform">  
				</div>
				<div class="form-group">
					<label>Số điện thoại:</label>
					<input type="number" name="" class="form-control" id="sdt" placeholder="Nhập số điện thoại ..." required="true">
				</div>
				<div style="display: none" id="loader"><img src='{{ asset("public") }}/img/loader1.gif' width="300px" height="200px"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning btn-lg" id="submit-vip">Kiểm tra</button>
				<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<div id="xac-nhan-thanh-toan" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header btn-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Xác nhận thanh toán</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-lg" id="dong-y-thanh-toan">Đồng ý</button>
				<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Không</button>
			</div>
		</div>
	</div>
</div>
<div id="chua-goi-mon" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header btn-danger">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Bàn này chưa gọi món ăn</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	var checkVip = false;// tao bien chon xac thuc ban dau la false
	$(document).ready(function(){
		let check = 1;// chi hien thi 1 lan duy nhat
		$(".thumbnail").on("click",function(){
			$("#co").removeAttr("href");
			$("#tk-vip").prop('checked', false);
				let maBan = $(this).attr("maban");// lay ma ban
				let tenBan = $(this).attr("tenban");// lay ten ban
				let giamGia = $("#giam-gia").attr("giamgia");
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});
				/** Phương thuc ajax goi de lay du lieu theo ma ban goi mon **/
				$.post("{{route('xemthanhtoan')}}",{data : maBan},data=>{
					let value = data.data;// gia tri cua thanh toan la mang
					if(value.length > 0){
						let stt = 0;
						let tong = 0;
						let tonggiam = 0;
						$("#co").click(function(){
							var theLoaiThanhToan =$('input[name=thanhtoan]:checked').val();
							if(theLoaiThanhToan == 1){
								// truong hop la khong du the
								$.get("admin/congviec/in-hoa-don/"+maBan+"/1 ",data=>{
									// mo giao dien thanh toan
									window.open("https://www.nganluong.vn/button_payment.php?receiver=phucdangb1400718@gmail.com&product_name=ThanhToan&price="+data.data+"&return_url=http://phucrestaurant.esy.es/&comments=ThanhToan",'_blank');
								});
							}else{
								$("#xac-nhan-thanh-toan").modal("show");
								$("#dong-y-thanh-toan").on('click',function(){
									window.location.href = "admin/congviec/in-hoa-don/"+maBan+"/0";
									checkVip = false;
									$("#thanhToan").modal('hide');
									$("#xac-nhan-thanh-toan").modal("hide");
								});
							}
						});
						loadDanhSach(maBan,tonggiam,giamGia);// goi ham load san pham
						$("#thanhToan").modal('show');// show modal thong bao
					}else{
						$("#chua-goi-mon").modal('show');
					}
				});
			});
	});
	function number_format(n){
		return String(n).replace(/(.)(?=(\d{3})+$)/g,'$1,');
	}
	function loadDanhSach(maBan,tonggiam,giamGia){
		$.post("{{route('xemthanhtoan')}}",{data : maBan},data=>{
					let value = data.data;// gia tri cua thanh toan la mang
					if(value.length > 0){
						var stt = 0 ;
						var tong = 0;
						$("#load-danh-sach").html("");
						for(let i = 0 ; i < value.length ; i++){
							stt++;
								$("#load-danh-sach").append("<tr style='text-align:center'><td>"+stt+"</td><td>"+value[i].tenMon+"</td><td><input type='number' class='form-control update-soluong' min='0' value="+value[i].soluong+" idThanhToan ="+value[i].idThanhToan+" maBan="+value[i].maBan+" /></td><td>"+number_format(value[i].giaMonAn)+"</td><td>"+number_format(value[i].giaMonAn*value[i].soluong)+"</td><tr>");// them vao html
								tong = tong + value[i].giaMonAn*value[i].soluong;
								// kiem tra co giam gia hay khong co thi thanh toan giam gia
								$("#tong-cong").html(number_format(tong)+" VNĐ");
							}
							if(giamGia != undefined){
								tonggiam = eval((tong*(100-giamGia))/100);
								$("#tonggiam").html(number_format(tonggiam)+" VNĐ");
							}
						}
					});
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#tk-vip").on("click",function(){
			$("#inform").html("");
			$("#loader").hide();// hien loader
			if(!checkVip){// truong hop la chua xac thuc 
				$("#vip").modal("show");
				$("#submit-vip").click(function(){
					checkVip = true;// gan bien da chon xac thuc
					var sdt = $("#sdt").val();// lay du lieu sdt
					$("#loader").show();// hien loader
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						}
					});
					/*** AJAX gui du lieu den server **/
					$.post("{{route('taikhoanvip')}}",{sdt : sdt} ,data=>{
						let getData = data.data;
						if(getData == null){
							let html = '<div class="alert alert-danger">Tài khoản không tồn tại </div>';
							$("#tk-vip").prop('checked',false);
							checkVip = false;
                         	$("#loader").hide();// hien loader
                         	$("#inform").html(html);
                         }else{
                         	let html = '<div class="alert alert-success">Xác thực thành công </div>';
                         	$("#tk-vip").prop('checked',true);
                            $("#loader").hide();// hien loader
                            $("#inform").html(html);
                            setTimeout(function(){
                            	$("#vip").modal('hide');
                            },1000);
                        }
                        $("#sdt").val("");
                    });
				});
			}else{
				$("#vip").modal('hide');
			}
		});	
	});
</script>
<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('input[name=thanhtoan]').change(() =>{
			var data =$('input[name=thanhtoan]:checked').val();
			if(data== 1){
				$("#the-tin-dung").show();
				$("#co").hide();
			}else{
				$("#co").show();
				$("#the-tin-dung").hide();
			}
		}); 
	});
</script> -->
<script type="text/javascript">
	$(document).on('keyup','.update-soluong',function(){
		var id = $(this).attr("idThanhToan"); // idThanhToan
		var soLuong = $(this).val();// so luong 
		var maBan = $(this).attr('maBan');
		var giamGia = $("#giam-gia").attr("giamgia");
		var tonggiam = 0;
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});
		$.post("{{route('capnhatthanhtoan')}}",{idThanhToan : id,soLuong:soLuong} ,data=>{
			if(data.data){
				let html = '<div class="alert alert-success">Cập nhật thành công số lượng</div>';
				$("#thong-bao-cap-nhat").html(html);
				loadDanhSach(maBan,tonggiam,giamGia);
			}else{
				let html = '<div class="alert alert-danger">Số lượng phải lớn hơn 1</div>';
				$("#thong-bao-cap-nhat").html(html);
			}
			$("#thong-bao-cap-nhat").show();// hien thong bao
			setTimeout(function(){
                $("#thong-bao-cap-nhat").hide();// an thong bao
            },3000);
		});
	});
</script>
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection
