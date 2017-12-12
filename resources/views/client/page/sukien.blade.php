@extends('client.layout.index')
@section('title')Sự kiện | Nhà hàng FOOD
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
.max-lines {
  display: block; /* or inline-block */
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 5.0em;
}
.label-sale {
    background: #f48549 none repeat scroll 0 0;
    display: inline-block;
    left: 0px;
    padding: 30px 30px 5px;
    position: absolute;
    top: 14px;
    transform: rotateZ(-45deg);
    -moz-transform: rotateZ(-45deg);
    -webkit-transform: rotateZ(-45deg);
    -o-transform: rotateZ(-45deg);
    -ms-transform: rotateZ(-45deg);
    z-index: 0;
    text-transform: uppercase;
    font-size: 7px;
}
.label {
    display: inline;
    padding: .2em .5em .5em;
    font-size: 150%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}
</style>
<div class="wrap-fullwidth">

	<!-- Begin Main Home Content -->
	<div class="wrap-content">        

		<h3 class="index-title">Sự kiện tại <a href="{{route('trangchuclient')}}" style="color: #f47500">Food</a></h3>
		<div class="clear"></div>


		<ul id="infinite-articles" class="masonry_list js-masonry" style="position: relative; height: 1302px;">
			<?php $today =date("Y-m-d"); ?>
			@foreach($sukien as $lm)
			@if($lm->thoiGianKetThuc < $today)
			<li class="ex34 post-58 post type-post status-publish format-standard has-post-thumbnail hentry category-desserts category-salads category-sandwiches tag-breakfast tag-morning tag-noodle-salad tag-recipe tag-saturday"  style="position: absolute; left: 0px; top: 0px; display: block; z-index: 1;opacity: 0.5">
				<span class="label label-sale">-{{$lm->phanTramGiamGia}}%</span>
				@if(strpos($lm->hinhDaiDien, 'http') !== false)
				<a href="#"><img width="250" height="250" src="{{$lm->hinhDaiDien}}" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="{{$lm->tenSuKien}}" title="{{$lm->tenSuKien}}" sizes="(max-width: 250px) 100vw, 250px" ></a>
				@else 
				<a href=""><img width="250" height="250" src="storage/app/upload/sukien/{{$lm->hinhDaiDien}}" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="{{$lm->tenSuKien}}" title="{{$lm->tenSuKien}}"  sizes="(max-width: 250px) 100vw, 250px"></a>
				@endif
				<div class="article-wrap">
					<div class="article-category"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <a href="#">{{$lm->tenSuKien}}</a>                         </div><!-- end .article-category -->
				</div><!-- end .article-wrap -->

				<div class="clear"></div>

				<div class="content-masonry max-lines">
					<a href="../../thai-noodle-salad-with-peanut-lime-dressing/index.html"><h3>{!!$lm->moTaSuKien!!}</h3></a>
					
				</div><!-- end .content-masonry -->
			</li>
			@else
			<li class="ex34 post-58 post type-post status-publish format-standard has-post-thumbnail hentry category-desserts category-salads category-sandwiches tag-breakfast tag-morning tag-noodle-salad tag-recipe tag-saturday"  style="position: absolute; left: 0px; top: 0px; display: block; z-index: 1">
				<span class="label label-sale">-{{$lm->phanTramGiamGia}}%</span>
				@if(strpos($lm->hinhDaiDien, 'http') !== false)
				<a href="#"><img width="250" height="250" src="{{$lm->hinhDaiDien}}" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="{{$lm->tenSuKien}}" title="{{$lm->tenSuKien}}" sizes="(max-width: 250px) 100vw, 250px" ></a>
				@else 
				<a href="#"><img width="250" height="250" src="storage/app/upload/sukien/{{$lm->hinhDaiDien}}" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="{{$lm->tenSuKien}}" title="{{$lm->tenSuKien}}"  sizes="(max-width: 250px) 100vw, 250px"></a>
				@endif
				<div class="article-wrap">
					<div class="article-category"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <a href="#">{{$lm->tenSuKien}}</a>                         </div><!-- end .article-category -->
				</div><!-- end .article-wrap -->

				<div class="clear"></div>

				<div class="content-masonry max-lines">
					<a href="../../thai-noodle-salad-with-peanut-lime-dressing/index.html"><h3>{!!$lm->moTaSuKien!!}</h3></a>
					
				</div><!-- end .content-masonry -->
			</li>
			@endif
			@endforeach
		</ul>  
		<center>
			<div class="toolbar">
					<div class="row text-center">{{$sukien->links()}}</div>
				</div>
		</center>
		<!-- Pagination -->
		<!-- pagination -->
	</div><!-- end .home-content -->


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
@endsection