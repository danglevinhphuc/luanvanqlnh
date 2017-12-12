<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>In hoá đơn</title>
<style type="text/css">
		body{
			text-align: center;
			width: 100%;
			font-family: DejaVu Sans;
		}
		header{
			line-height: 3px;
		}
		td,th{
			border: 1px dashed;
			text-align: center;
		}
		table{
			border-collapse: collapse;
			margin: 0 auto;
		}
		.phieu{
			font-size: 22px;
			font-weight: bold;
			color: #f07800;
		}
		section{
			margin: 0 350px;
			width: 280px;
			display: block;
			line-height: 5px;
		}
		.thanh-toan{
			float: left;
		}
		.gia-tri{

		}
		footer{
			display: block;
			color: #f07800;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<header><h2>FOOD RESTAURANT</h2>
	<h3>2A Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ</h3>
	<h3>SĐT : 0923 167 564</h3>
	<p>**************</p>
	<p class="phieu">Phiếu tính tiền</p></header>
	<table>
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên</th>
				<th>Số lượng</th>
				<th>Đơn giá</th>
				<th>Thành tiền</th>
			</tr>
		</thead>
		<tbody>
			<?php $stt =0 ; $tong = 0;  $dataCheck = $thanhtoan[count($thanhtoan)-1]; ?>
			<?php if(count($dataCheck)  ==1 ) {?>
			@foreach($thanhtoan as $ts)
			<?php $stt++;
				  $tong= $tong +$ts->giaMonAn*$ts->soluong;
			 ?>
			<tr>
				<td>{{$stt}}</td>
				<td>{{$ts->tenMon}}</td>
				<td>{{$ts->soluong}}</td>
				<td>{{number_format($ts->giaMonAn)}}</td>
				<td>{{number_format($ts->giaMonAn*$ts->soluong)}}</td>
			</tr>
			@endforeach
			<?php }else{ ?>
				<?php for($i = 0 ; $i < count($thanhtoan) -1 ; $i++){  
					$stt++;
					$tong= $tong +$thanhtoan[$i]->giaMonAn*$thanhtoan[$i]->soluong; ?>
					<tr>
					<td>{{$stt}}</td>
					<td>{{$thanhtoan[$i]->tenMon}}</td>
					<td>{{$thanhtoan[$i]->soluong}}</td>
					<td>{{number_format($thanhtoan[$i]->giaMonAn)}}</td>
					<td>{{number_format($thanhtoan[$i]->giaMonAn*$thanhtoan[$i]->soluong)}}</td>
				</tr>
				<?php } ?>
			<?php } ?>
		</tbody>
	</table>
	<section>
	<?php if(count($dataCheck)  ==1 ) {?>
		<p><span class="thanh-toan">Tổng cộng:</span><span class="gia-tri">{{number_format($tong)}} vnđ</span></p>
		<p>-------------------------------</p>
		<p><span class="thanh-toan">Thanh toán:</span><span class="gia-tri">
		<?php if(Cookie::get('vip') == 1){?>
		{{number_format( ($tong*(100-5)/100) )}} vnđ</span></p>
	<?php }else{?>
		{{number_format($tong)}} vnđ</span></p>
		<?php } Cookie::queue('vip', 0);// cap nhat lai tai khoan vip?>
	<?php }else{?>
		<p><span class="thanh-toan">Tổng cộng:</span><span class="gia-tri">{{number_format($tong)}} vnđ</span></p>
		<p><span class="thanh-toan">Khuyến mãi:</span><span class="gia-tri">{{$dataCheck['phantram']}} %</span></p>
		<p>-------------------------------</p>
		<p><span class="thanh-toan">Thanh toán:</span><span class="gia-tri">{{number_format($dataCheck['thanhtiengiam'])}} vnđ</span></p>
	<?php } ?>
	</section>
	<?php if(Cookie::get('vip') == 1){?>
		<p><span class="thanh-toan">Sử dụng tài khoản VIP</span></p>
	<?php } ?>
	<footer>HÂN HẠNH PHỤC VỤ QUÝ KHÁCH</footer>
</body>
</html>