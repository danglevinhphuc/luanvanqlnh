
@extends('admin.layout.index')
@section('content')
	<div id="notifi"></div>
<div class="content-wrapper">
	<section class="content-header text-center">
		<h1>
			Công việc của phục vụ
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3 id="so-luong-chua-hoan-thanh">Trống</h3>

						<p>Số lượng chưa hoàn thành</p>
					</div>
					<a class="small-box-footer" style="cursor: pointer;" id="xem-tat-ca"></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6 pull-right">
				<!-- small box -->
				<div class="small-box  bg-aqua">
					<div class="inner">
						<h3 id="so-luong-hoan-thanh">Trống</h3>

						<p>Số lượng hoàn thành</p>
					</div>
					<a class="small-box-footer" style="cursor: pointer;" id="xem-tat-ca"></a>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<table class="table ">
			<thead>
				<tr align="center">
					<th>STT</th>
					<th>Tên bàn</th>
					<th>Món</th>
					<th>Số lượng</th>
					<th>Xác nhận xong</th>
				</tr>
			</thead>
			<tbody id="danh-sach">
				<!--  -->					
			</tbody>
		</table>
	</section>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		var socket = io.connect("http://localhost:3000/");
		var stt = 0;
		var tongSoLuongHoanThanh = 0;
		var tongSoLuongChuaHoanThanh = 0;
		var check = 0;
		var stt = 0;
		/* TU DONG LOAD LAI KHI LOAD LAI TRANG ***/
		socket.on("send item done load to client form server",function(dataFromServer){
			if(!check){// chi xuat hien 1 lan khi load lai trang
				check++;
				tongSoLuongChuaHoanThanh = 0;
				// tao vong lap de xuat du lieu de html
				for(let i = 0 ; i < dataFromServer.length ;i++){
					let data = dataFromServer[i];
					/** CAP NHAT SO LUONG CHUA HOAN THANH **/
					tongSoLuongChuaHoanThanh = parseInt( parseInt(tongSoLuongChuaHoanThanh) + parseInt(data['soluong']));// so luong se duoc tang dan khi co du lieu gui den 
					// goi ham them du lieu vao html 
					if(localStorage.getItem("so-luong-chua-hoan-thanh")=="null"){
						setValueHtml("so-luong-chua-hoan-thanh",tongSoLuongChuaHoanThanh,"soluongchuahoanthanh");
					}
					stt++;
					$("#danh-sach").append("<tr style='text-align:center' id='"+data['idban']+"'><td>"+stt+"</td><td>"+data['tenban']+"</td><td>"+data['mon']+"</td><td>"+data['soluong']+"</td><td><button class='btn btn-default xac-nhan-xong' tenban='"+data['tenban']+"' mon='"+data['mon']+"' soluong='"+data['soluong']+"' idban='"+data['idban']+"'><i class='fa fa-check-circle-o' style='color:green'></i></button></td><tr>");// them vao html
				}
			}
		});
		/*** Kiem tra tong so luong hoan thanh co ton tai hay chua  **/
		if(localStorage.getItem("soluongchuahoanthanh") != "" &&
			localStorage.getItem("soluongchuahoanthanh") != "null"){
			// truong hop co ton tai trong localStorage
			tongSoLuongChuaHoanThanh = localStorage.getItem("soluongchuahoanthanh");
			// goi ham them du lieu vao html 
			setValueHtml("so-luong-chua-hoan-thanh",tongSoLuongChuaHoanThanh,"soluongchuahoanthanh");
		}
		if(localStorage.getItem("soluonghoanthanh") != "" &&
			localStorage.getItem("soluonghoanthanh") != "null"){
			// truong hop co ton tai trong localStorage
			tongSoLuongHoanThanh = localStorage.getItem("soluonghoanthanh");
			// goi ham them du lieu vao html 
			setValueHtml("so-luong-hoan-thanh",tongSoLuongHoanThanh,"soluonghoanthanh");
		}
		/** Lay du lieu tu server gui den gom co ban da duoc goi mon va so luong***/
		socket.on("send item move table from server",function(data){
			if(!tongSoLuongChuaHoanThanh){
				tongSoLuongChuaHoanThanh =  parseInt(data['soluong']);
			}else{
				tongSoLuongChuaHoanThanh = parseInt(tongSoLuongChuaHoanThanh) + parseInt(data['soluong']);// so luong se duoc tang dan khi co du lieu gui den 
			}
			// goi ham them du lieu vao html 
			setValueHtml("so-luong-chua-hoan-thanh",tongSoLuongChuaHoanThanh,"soluongchuahoanthanh");
			stt++;
			// them phan tu vao html
			$("#danh-sach").append("<tr style='text-align:center' id='"+data['idban']+"'><td>"+stt+"</td><td>"+data['tenban']+"</td><td>"+data['mon']+"</td><td>"+data['soluong']+"</td><td><button class='btn btn-default xac-nhan-xong' tenban='"+data['tenban']+"' mon='"+data['mon']+"' soluong='"+data['soluong']+"' idban='"+data['idban']+"'><i class='fa fa-check-circle-o' style='color:green'></i></button></td><tr>");// them vao html
			thongBaoAmThanh();// goi den ham am  thanh
		});
		/* Su kien click de thuc thi xac nhan giao hang thanh cong ***/
		$(document).on('click','.xac-nhan-xong',function(){
        	let soLuong = $(this).attr("soluong");// lay so luong 
        	let idBan = $(this).attr('idban');
        	// tang tong so luong hoan thanh len 
        	if(confirm("Xác nhận hoàn thành")){
				//giam so luong chua hoan thanh lai
				//console.log(tongSoLuongHoanThanh);
				if(!tongSoLuongHoanThanh){
					tongSoLuongHoanThanh =  parseInt(soLuong);
				}else{
					tongSoLuongHoanThanh = parseInt(tongSoLuongHoanThanh) + parseInt(soLuong);
				}
				tongSoLuongChuaHoanThanh = parseInt(tongSoLuongChuaHoanThanh) - parseInt(soLuong);
				/** XOA the khi hoan thanh **/
				$("#"+idBan).remove();// xoa tu vi tri trong mang
				//cap nhat lai localStorage
				setValueHtml("so-luong-hoan-thanh",tongSoLuongHoanThanh,"soluonghoanthanh");
				setValueHtml("so-luong-chua-hoan-thanh",tongSoLuongChuaHoanThanh,"soluongchuahoanthanh");
				/* GUI ID BAN DEN SERVER DE XOA DU LIEU KHI XAC NHAN HOAN THANH **/
				socket.emit("send idBan from server",idBan);
        	}
        });
	});
	/*** HAM gan du lieu vao html  
		3 bien dau vao 
		id ten cua id html
		data du lieu duoc gan vao
		loai la so luong chua hay hoan thanh
	**/
	function setValueHtml(id,data,loai){
		$("#"+id).html(data);
		localStorage.setItem(loai,data);
	}
	/*** Ham am thanh **/
	function thongBaoAmThanh(){
		$("#notifi").append("<audio autoplay='true'> <source src='{{ asset('public') }}/sound/served.mp3' type='audio/mpeg'> </audio>");
	}
</script>
@endsection