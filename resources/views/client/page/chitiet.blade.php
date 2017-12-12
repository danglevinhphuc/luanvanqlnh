@extends('client.layout.index')
<?php $monan = $chitietmon[0]; ?>
@section('title')Chi tiết món ăn & thức uống |{{$monan->tenMonAn}}|Nhà hàng FOOD
@endsection
@section('content')
<style type="text/css">
.pagination {
	display: inline-block;
	padding-left: 0;
	margin: 20px 0;
	border-radius: 4px;
}
.pagination>li {
	display: inline;
	background-color: #f47500;
}
.pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
	z-index: 2;
	color: #23527c;
	background-color: #f47500;
	border-color: #ddd;
}
.pagination>li:last-child>a, .pagination>li:last-child>span {
	border-top-right-radius: 4px;
	border-bottom-right-radius: 4px;
}
.active{
	background: #e1d1d1 !important;
	color: #fff;
}
.pagination>li>a, .pagination>li>span {    
	padding: 6px 12px;
	margin-left: -1px;
	color: #fff;
	text-decoration: none;
	border: 1px solid #ddd;
}
li.ex34 a img:hover{
	transform: scale(1.2);
}
li.ex34 a img{
	-webkit-transition: all 1s;
}
</style>
<div class="wrap-fullwidth">

	<div class="wrap-fullwidth">
		<div class="single-content">
			<div class="entry-top">
				<h1 class="article-title entry-title" >{{$monan->tenMonAn}} | tại nhà hàng <a href="{{route('trangchuclient')}}" style="color: #f47500">FOOD</a></h1>
				<ul class="meta-entry-top" ><li>Giá:</a> {{number_format($monan->giaMonAn)}} VNĐ / {{$monan->loaimon->trangThai}}</li>         
            </ul>
			</div><!-- end .entry-top -->


			<article>
				<div class="post post-58 type-post status-publish format-standard has-post-thumbnail hentry category-desserts category-salads category-sandwiches tag-breakfast tag-morning tag-noodle-salad tag-recipe tag-saturday" id="post-58">

					<div class="media-single-content">
						@if(strpos($monan->hinhAnhMonAn, 'http') !== false)
						<img width="950" height="634" src="{{$monan->hinhAnhMonAn}}" class="attachment-food_wp_thumbnail-single-image size-food_wp_thumbnail-single-image wp-post-image" alt="{{$monan->tenMonAn}}" sizes="(max-width: 950px) 100vw, 950px">
						@else
							<img width="950" height="634" src="storage/app/upload/monan/{{$monan->hinhAnhMonAn}}" class="attachment-food_wp_thumbnail-single-image size-food_wp_thumbnail-single-image wp-post-image" alt="{{$monan->tenMonAn}}" sizes="(max-width: 950px) 100vw, 950px">
						@endif
					</div><!-- end .media-single-content -->

					<div class="entry">
						<div class="p-first-letter">
						{!!$monan->moTaMonAn!!}
						</div><!-- end .p-first-letter -->
						<div class="clear"></div>

						<div class="tags-cats">
							<!-- categories -->
							<div class="ct-size"><div class="entry-btn">Danh mục món ăn khác:</div>@foreach($loaimon as $loaimon) <a href="{{route('monantheodanhmuc',$loaimon->loaiMonKhongDau)}}" rel="category tag">{{$loaimon->loaiMon}}</a> · @endforeach</div><div class="clear"></div>
						</div><!-- end .tags-cats -->

						<div class="clear"></div>                        
					</div><!-- end .entry -->
					<div class="clear"></div> 
				</div><!-- end #post -->
			</article><!-- end article -->

</div>


	<!-- Begin Sidebar 1 (default right) -->
	<div class="sidebar-wrapper">
		<aside class="sidebar" style="position: relative; height: 1729px;"> 




				<div class="widget widget_food_wp_topposts" style="position: absolute; left: 0px; top: 575px;"><h3 class="title">Các món ăn khác</h3><div class="clear"></div>
				<ul class="article_list">
					<?php  $stt= 0; ?>
					@foreach($monanrandom as $monanrandom)
					<?php  $stt++; ?>
					<li>
						<div class="post-nr">{{$stt}}</div>
						@if(strpos($monanrandom->hinhAnhMonAn, 'http') !== false)
				<a href="{{route('chitietmonan',$monanrandom->tenMonAnKhongDau)}}"><img width="90" height="90" src="{{$monanrandom->hinhAnhMonAn}}" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="{{$monanrandom->tenMonAn}}" title="{{$monanrandom->tenMonAn}}" sizes="(max-width: 90px) 100vw, 90px"></a>
				@else 
				<a href="{{route('chitietmonan',$monanrandom->tenMonAnKhongDau)}}"><img width="90" height="90" src="storage/app/upload/monan/{{$monanrandom->hinhAnhMonAn}}" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="{{$monanrandom->tenMonAn}}" title="{{$monanrandom->tenMonAn}}"  sizes="(max-width: 90px) 100vw, 90px"></a>
				@endif
						<div class="an-widget-title" style="margin-left:105px;">
							<h4 class="article-title"><a href="#">{{$monanrandom->tenMonAn}}</a></h4>                
						</div>
					</li>
					@endforeach
				</ul><div class="clear"></div>


			</div> 

	</aside>
</div>    <!-- end #sidebar 1 (default right) --> 

				<div class="clear"></div>
			</div>




			<div class="clear"></div>
		</div>
		@endsection