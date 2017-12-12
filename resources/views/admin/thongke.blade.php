@extends('admin.layout.index')
@section('content')
<?php
	// tong doanh thu theo tat ngay trong thang
$doanhThuTheoThang = $query_doanhthu[0]->doanhthutheothang;
?>
<style type="text/css">
.chart {
	display: table;
	table-layout: fixed;
	width: 100%;
	max-width: 100%;
	height: 200px;
	margin: 50px auto;
	background-image: linear-gradient(to top, rgba(0, 0, 0, 0.1) 2%, rgba(0, 0, 0, 0) 2%);
	background-size: 100% 50px;
	background-position: left top;
}
.chart li {
	position: relative;
	display: table-cell;
	vertical-align: bottom;
	height: 500px;
}
.chart b{
	margin-left: 13px;
}
.chart span {
	margin: 0 1em;
	display: block;
	background: rgba(119, 116, 220, 0.75);
	animation: draw 1s ease-in-out;
}
.add-background{
	background: rgba(119, 116, 0, 0.75) !important;
}
.chart span:before {
	position: absolute;
	left: 0;
	right: 0;
	top: 100%;
	padding: 5px 1em 0;
	display: block;
	text-align: center;
	content: attr(title);

	word-wrap: break-word;
}
.day{
	font-weight: bold;
	color: #f07800;
}
.thong-ke-duoi-20{
	cursor:pointer;display:block;margin-left:300px;
}
.giam-chieu-cao{
	margin-top:-301px;
}
.thong-ke-duoi-30{
	cursor:pointer;display:block;margin-left:600px;
}
section{	
	color: #000;
}
@keyframes draw {
	0% {
		height: 0;
	}
}
@media screen and (max-width:768px){
	.thong-ke-duoi-30{
		cursor:pointer;
		display:block;
		margin-left:0px;
	}
	.thong-ke-duoi-30.giam-chieu-cao{
		margin-top: 0px;
	}
}
@media screen and (max-width:468px){
	.thong-ke-duoi-30,.thong-ke-duoi-20{
		cursor:pointer;
		display:block;
		margin-left:0px;
	}
	.giam-chieu-cao{
		margin-top: 0px;
	}
}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Thống kê danh sách
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>{{$monan}}</h3>

						<p>Số món ăn</p>
					</div>
					<div class="icon">
						<i class="fa fa-list-ol"></i>
					</div>
					<a href="{{route('danhsachthucdon')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6" >
				<div class="small-box" style="background-color: #00a65a !important; color: #fff">
					<div class="inner">
						<h3>{{$nhanvien}}</h3>

						<p>Số nhân viên</p>
					</div>
					<div class="icon">
						<i class="fa fa-users"></i>
					</div>
					<a href="{{route('danhsachnhansu')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>{{$khachhang}}</h3>

						<p>Số khách hàng</p>
					</div>
					<div class="icon">
						<i class="fa fa-users"></i>
					</div>
					<a href="{{route('danhsachkhachhang')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3>{{$sukien}}</h3>

						<p>Số sự kiện</p>
					</div>
					<div class="icon">
						<i class="fa fa-birthday-cake"></i>
					</div>
					<a href="{{route('danhsachsukien')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</section>
	<section class="col-lg-12 connectedSortable ui-sortable">
		<!-- Custom tabs (Charts with tabs)-->
		<div class="nav-tabs-custom" style="cursor: move;">
			<!-- Tabs within a box -->
			<ul class="nav nav-tabs pull-right ui-sortable-handle">
				<li class="active"><a href="#revenue-chart" data-toggle="tab" aria-expanded="true">Doanh thu</a></li>
				<li class="pull-left header"><i class="fa fa-inbox"></i> Biểu đồ thống kê</li>
			</ul>
			<div class="tab-content no-padding">
				<!-- Morris chart - Sales -->
				<div class="tab-pane active" id="revenue-chart" style="position: relative; height: 100%; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><div class="morris-hover-point" style="color: #3c8dbc">
					<ul class="chart">
						<?php
						$chiaphantram = 0;
						for($i = 0 ;$i <count($query_tungngay) ;$i++){ 


							$chiaphantram =  intval(($query_tungngay[$i]->doanhthutungngay))*100/$doanhThuTheoThang;
							?>
							<li>
								<b style="color: #A069C3"><?php echo round($chiaphantram,2).'%' ?></b>
								<span style="height:<?php echo $chiaphantram.'%' ?>" title="{{$query_tungngay[$i]->ngayDat}}" class="cot-click-{{$query_tungngay[$i]->ngayDat}} "></span>
								<span style="color: #fff; top: 20px;" class="cot-click-{{$query_tungngay[$i]->ngayDat}} "add-background">{{$query_tungngay[$i]->ngayDat}}</span>
							</li>
							<?php }?>
						</ul>
						<h1 id="thongke" style="text-align: center;margin-top: 40px; color: #000 ;font-weight: bold; font-size: 18px">Biểu đồ thống kê doanh thu theo từng ngày trong <?php echo date('m-Y') ?> </h1>

						<section>
							<h3>Tổng <?php echo date('m-Y') ?> với doanh thu :  <?php echo number_format($doanhThuTheoThang) ?> VNĐ</h3>
							<?php
							$chiaphantram = 0;
							for($i = 0 ;$i <count($query_tungngay) ;$i++){ 
								if($i <10){
									echo "<p ><span class='day' style='cursor:pointer'>".$query_tungngay[$i]->ngayDat."</span> : ";
									echo number_format($query_tungngay[$i]->doanhthutungngay)." VNĐ"."</p>";
								}else if($i < 20){
									if($i == 10){
										echo "<p class='thong-ke-duoi-20 giam-chieu-cao'><span class='day'>".$query_tungngay[$i]->ngayDat."</span> : ";
										echo number_format($query_tungngay[$i]->doanhthutungngay)." VNĐ"."</p>";
									}else{
										echo "<p class='thong-ke-duoi-20'><span class='day'>".$query_tungngay[$i]->ngayDat."</span> : ";
										echo number_format($query_tungngay[$i]->doanhthutungngay)." VNĐ"."</p>";
									}
								}else{
									if($i == 20){
										echo "<p class='thong-ke-duoi-30 giam-chieu-cao'><span class='day'>".$query_tungngay[$i]->ngayDat."</span> : ";
										echo number_format($query_tungngay[$i]->doanhthutungngay)." VNĐ"."</p>";
									}else{
										echo "<p class='thong-ke-duoi-30'><span class='day'>".$query_tungngay[$i]->ngayDat."</span> : ";
										echo number_format($query_tungngay[$i]->doanhthutungngay)." VNĐ"."</p>";
									}
								}
							}
							?>
						</section>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>
@section("script")
	<script type="text/javascript">
		var nameBanDau = "";// gia tri ban dau
		$(document).ready(function(){
			$(".day").on('click',function(){
				name = $(this).text();// lay ten trong text
				if(nameBanDau != ""){	// truong hop chua click lan nao
					// xoa class da xem 
					$(".cot-click-"+nameBanDau).removeClass("add-background");
					// them class moi 
					$(".cot-click-"+name).addClass("add-background");
				}else{	
					// them class moi 
					$(".cot-click-"+name).addClass("add-background");
				}
				nameBanDau = name;// gan vao gia tri ban dau
			});
		});
	</script>
@endsection
@endsection