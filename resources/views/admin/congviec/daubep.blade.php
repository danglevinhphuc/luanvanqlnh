
@extends('admin.layout.index')
@section('content')
<div id="notifi"></div>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Công việc của đầu bếp
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3 id="ban-an">Trống</h3>

						<p>Số lượng món ăn</p>
					</div>
					<a class="small-box-footer" style="cursor: pointer;" id="xem-tat-ca">Xem tất cả <i class="fa  fa-arrow-down"></i></a>
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
		var tongSoLuong = 0;
		var tongSoBan = [];
		var arrayShow = [];
		var stt = 0;
		var check = 0;
		socket.on("send item choose from server",function(data){
			/****TAO VONG LAP DE LAY TONG SO LUONG THEO TUNG SO LUONG ***/
			if(!check){// chi xuat hien 1 lan khi load lai trang
			for(let i = 0 ; i < data.itemChoose.length ; i++){
				arrayShow.push(data.itemChoose[i]);
				for(let j = 0 ; j< data.itemChoose[i].soluong.length; j++){
					tongSoLuong = parseInt(tongSoLuong + parseInt(data.itemChoose[i].soluong[j]));
				}	
			}
			/** Kiem tra neu tongSoLuong > 0 thi thong bao****/
			if(tongSoLuong >0){
				thongBaoAmThanh();
			}
			$("#ban-an").html(tongSoLuong);// show du lieu
			// Tao vong lap duyet mang de xuat du lieu ra ngoai
        	// gom co mang lay so luong ma goi mon
        	// mang thu 2 la dung de duyet so mon an can goi va so luong
        	// mang 2 show du lieu ra ngoai
        	for(let i = 0 ; i < arrayShow.length ; i++){
        		let dataMonAn = arrayShow[i].tenmoncodau;// bien luu mon an co dau
        		let dataSl = arrayShow[i].soluong;// bien luu so luong theo tung mong
        		let dataTenBan = arrayShow[i].tenban;// bien luu ten ban
        		for(let j = 0 ; j  < dataMonAn.length ; j++){
        			stt++;// stt tang dan
        			let dataMonAnCoDau = dataMonAn[j];// show gia tri theo tung mang
        			let dataSoLuong = dataSl[j];// show so luong theo tung mang
        			$("#danh-sach").append("<tr style='text-align:center' id='ban-id-"+stt+"'><td>"+stt+"</td><td>"+dataTenBan+"</td><td>"+dataMonAnCoDau+"</td><td>"+dataSoLuong+"</td><td><button class='btn btn-default xac-nhan-xong' tenban='"+dataTenBan+"' mon='"+dataMonAnCoDau+"' soluong='"+dataSoLuong+"' idban='ban-id-"+stt+"'><i class='fa fa-check-circle-o' style='color:green'></i></button></td><tr>");// them vao html
        		}
        	}
        	check = 1;
        	let idDelete =data.idBan;// gan mang xoa
        	for(let i = 0 ; i < idDelete.length ; i++){
        		$("#"+idDelete[i]).remove();// xoa tu vi tri trong mang
        	}
        }
		});
		// nhan du lieu goi mon tu server
		socket.on("send item from server",function(data){			
			arrayShow = [];
			/****TAO VONG LAP DE LAY TONG SO LUONG THEO TUNG SO LUONG ***/
			for(let i = 0 ; i< data.soluong.length; i++){
				tongSoLuong = parseInt(tongSoLuong + parseInt(data.soluong[i]));
			}
        	$("#ban-an").html(tongSoLuong);// show du lieu 
        	thongBaoAmThanh();
        	arrayShow.push(data);        	
        	// Tao vong lap duyet mang de xuat du lieu ra ngoai
        	// gom co mang lay so luong ma goi mon
        	// mang thu 2 la dung de duyet so mon an can goi va so luong
        	// mang 2 show du lieu ra ngoai
        	for(let i = 0 ; i < arrayShow.length ; i++){
        		let dataMonAn = arrayShow[i].tenmoncodau;// bien luu mon an co dau
        		let dataSl = arrayShow[i].soluong;// bien luu so luong theo tung mong
        		let dataTenBan = arrayShow[i].tenban;// bien luu ten ban
        		for(let j = 0 ; j  < dataMonAn.length ; j++){
        			stt++;// stt tang dan
        			let dataMonAnCoDau = dataMonAn[j];// show gia tri theo tung mang
        			let dataSoLuong = dataSl[j];// show so luong theo tung mang
        			$("#danh-sach").append("<tr style='text-align:center' id='ban-id-"+stt+"'><td>"+stt+"</td><td>"+dataTenBan+"</td><td>"+dataMonAnCoDau+"</td><td>"+dataSoLuong+"</td><td><button class='btn btn-default xac-nhan-xong' tenban='"+dataTenBan+"' mon='"+dataMonAnCoDau+"' soluong='"+dataSoLuong+"' idban='ban-id-"+stt+"'><i class='fa fa-check-circle-o' style='color:green'></i></button></td><tr>");// them vao html
        		}
        	}
        });
        /** Xac nhan xong khi hoan thanh mon an ***/
        $(document).on('click','.xac-nhan-xong',function(){
        	let soluong = $(this).attr('soluong');// thuoc tinh so luong
        	let tenban = $(this).attr('tenban');// thuoc tinh ten ban
        	let mon = $(this).attr('mon');// thuoc tinh mon
        	let idban =$(this).attr('idban');// thuoc tinh id ban 
        	/** GUI DU LIEU DEN SERVER ***/
        	let dataItemSend = {
        		"soluong" : soluong,
        		"tenban" : tenban,
        		"mon" : mon,
        		'idban':idban
        	}
        	if(confirm("Xác nhận hoàn thành cho "+tenban+" với món "+mon+" và số lượng "+soluong+" ")){
        		socket.emit("send item to serve from client",dataItemSend );
        		// mon co idban trung thi remove khoi thanh phan trong table
        		// gui du lieu den server de khi load lai thi xac nhan da thanh cong 
        		// nhung trong server van con giu noi dung order tai ban
        		$("#"+idban).remove();
        	}
        });
	});
	function thongBaoAmThanh(){
		$("#notifi").append("<audio autoplay='true'> <source src='{{ asset('public') }}/sound/served.mp3' type='audio/mpeg'> </audio>");
	}
</script>
@endsection