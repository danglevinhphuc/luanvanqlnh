@extends('client.banan.index')
@section('title')Chọn bàn ăn | Nhà hàng FOOD
@endsection
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
</style>
<div class="tablechoose">
	<div class="container">
	<div class="row">
		@foreach($banan as $banan)
		<div class="col-xs-6 col-md-3" id="maban-{{$banan->maBan}}" style="cursor: pointer;">
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" >BẠN CÓ MUỐN CHỌN  <span id="nameTable" style="color: #f47500"></span> ĐỂ SỬ DỤNG KHÔNG ???</h4>
      </div>
      <div class="modal-footer">
      	<button type="button" id="co" class="btn btn-primary btn-lg" data-dismiss="modal">Có</button>
        <button type="button"  class="btn btn-danger btn-lg"  data-dismiss="modal">Không</button>
      </div>
    </div>

  </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
      $(document).ready(function(){
      		var socket = io.connect("http://localhost:3000/");
      		chuyenGiaoDien();
      		socket.on("send table choose",function(data){
        		anBan(data);// goi den ham an ban truyen tham so dau vao la array ma ban
        	});
        	$(".thumbnail").on('click',function(){
        		let getValueTable = $(this).attr('maban'); // lay id ma bang
        		let getNameTable =  $(this).attr('tenban');
        		$("#nameTable").html(getNameTable);// gan ten vao mục tieu đề
        		$('#myModal').modal('show');
        		//truong hop chon de su dung
        		$("#co").click(function(){
        			// them ma ban vao localStorage
        			localStorage.setItem("maban", getValueTable);
              localStorage.setItem("tenban", getNameTable);
        			// gui du lieu den server de giu ban da chon
        			socket.emit("send choose table",getValueTable);
        			// chuyen link den trang order món
        			window.location.href = "{{route('showchonmon')}}";
        		});
        	});
      });
      function chuyenGiaoDien(){
      	if(localStorage.getItem("maban") !== null){
      		window.location.href = "{{route('showchonmon')}}";
      	}
      }
      // ham dung den an ban 
      // bien dau vao la ma so ban
      function anBan(maBan){
      		for(let i = 0 ; i <= maBan.length ;i++){
      			$("#maban-"+maBan[i]).fadeOut();
      		}
      }
</script>
@endsection