@extends('client.layout.index')
@section('title')Trang chủ | Nhà hàng FOOD
@endsection
@section('content')
<style type="text/css">
	li a img.attachment-food_wp_thumbnail-blog-grid:hover{
	transform: scale(1.2);
}
li a img.attachment-food_wp_thumbnail-blog-grid{
	-webkit-transition: all 1s;
}
.max-lines {
  display: block; /* or inline-block */
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 5.0em;
}
</style>
<div id="featured-slider-wrap" >
	<div id="featured-slider">
		@foreach($monan as $monan)
		<div class="item">
			<a href="{{route('chitietmonan',$monan->tenMonAnKhongDau)}}">
				@if(strpos($monan->hinhAnhMonAn, 'http') !== false)
				<img width="345" height="345" src="{{$monan->hinhAnhMonAn}}"  />
				@else
				<img src="storage/app/upload/monan/{{$monan->hinhAnhMonAn}}" width="100px" height="100px">
				@endif
			</a>

			<div class="article-wrap">
				<div class="article-category"><i class="fa fa-cutlery" aria-hidden="true"></i> <a href="#">{{$monan->tenMonAn}}</a>                 </div><!-- end .article-category -->
			</div><!-- end .article-wrap -->
			<div class="clear"></div>
			<div class="content max-lines" >
				<a href="#"><h3>{!!$monan->moTaMonAn!!}</h3></a>
			</div>
		</div><!-- end .item -->
		@endforeach
	</div><!-- end #featured-slider -->
</div><!-- end #featured-slider-wrap -->
<div class="wrap-fullwidth">
	<div class="widget widget_food_wp_module1">	
		<!-- Articles Modules -->
		@foreach($loaimon as $loaimon)
		<h3 class="title-module">{{$loaimon->loaiMon}}! <span class="sright"><a href="{{route('monantheodanhmuc',$loaimon->loaiMonKhongDau)}}">Xem thêm ...</a></span></h3>
		<ul class="articles-modules" id="data-{{$loaimon->idLoaiMon}}">
		</ul><!-- end #top-articles-slider -->
		<div class="clear"></div>
		<script type="text/javascript">
			$(document).ready(()=>{
				let data = "{{$loaimon->idLoaiMon}}";
				if(data != ""){
                    $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                       }
                   });
                    $.post("{{route('monantheoloai')}}",{id : data} ,data=>{
                        $("#data-"+"{{$loaimon->idLoaiMon}}").html(data);
                    });
                }else{
                }
			});
		</script>
		@endforeach

	</div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection