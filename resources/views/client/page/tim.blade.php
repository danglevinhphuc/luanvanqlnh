@extends('client.layout.index')
@section('title')Tìm món ăn & thức uống |<?php echo $_GET['tim'] ?>	| Nhà hàng FOOD
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
.max-lines {
  display: block; /* or inline-block */
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 5.0em;
}
</style>
<div class="wrap-fullwidth">

	<!-- Begin Main Home Content -->
	<div class="wrap-content">        

		<h3 class="index-title">Tất cả món ăn & uống về : <span style="color:#f47500 "><?php echo $_GET['tim'] ?></span> </h3>
		<div class="clear"></div>


		<ul id="infinite-articles" class="masonry_list js-masonry" style="position: relative; height: 1302px;">
			@foreach($monan as $lm)
			<li class="ex34 post-58 post type-post status-publish format-standard has-post-thumbnail hentry category-desserts category-salads category-sandwiches tag-breakfast tag-morning tag-noodle-salad tag-recipe tag-saturday" id="post-58" style="position: absolute; left: 0px; top: 0px;">

				@if(strpos($lm->hinhAnhMonAn, 'http') !== false)
				<a href="{{route('chitietmonan',$lm->tenMonAnKhongDau)}}"><img width="250" height="250" src="{{$lm->hinhAnhMonAn}}" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="{{$lm->tenMonAn}}" title="{{$lm->tenMonAn}}" sizes="(max-width: 250px) 100vw, 250px"></a>
				@else 
				<a href="{{route('chitietmonan',$lm->tenMonAnKhongDau)}}"><img width="250" height="250" src="storage/app/upload/monan/{{$lm->hinhAnhMonAn}}" class="attachment-food_wp_thumbnail-blog-grid size-food_wp_thumbnail-blog-grid wp-post-image" alt="{{$lm->tenMonAn}}" title="{{$lm->tenMonAn}}"  sizes="(max-width: 250px) 100vw, 250px"></a>
				@endif
				<div class="article-wrap">
					<div class="article-category"><i class="fa fa-cutlery" aria-hidden="true"></i> <a href="#">{{$lm->tenMonAn}}</a>                         </div><!-- end .article-category -->
				</div><!-- end .article-wrap -->

				<div class="clear"></div>

				<div class="content-masonry max-lines">
					<a href="../../thai-noodle-salad-with-peanut-lime-dressing/index.html"><h3>{!!$lm->moTaMonAn!!}</h3></a>
					
				</div><!-- end .content-masonry -->
			</li>
			@endforeach
		</ul>  
		<center>
			<div class="toolbar">
					<div class="row text-center">{{$monan->appends(request()->query())->links()}}</div>
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
<h3 class="title-section" style="color: #f47500 !important"><i class="fa fa-cutlery" aria-hidden="true" style="color: #000"></i> Món ăn khác</span></h3>
<div id="featured-slider-wrap" >
	<div id="featured-slider" style="border-radius: 50px;">
		@foreach($monanslide as $monanslide)
		<div class="item">
			<a href="{{route('chitietmonan',$monanslide->tenMonAnKhongDau)}}">
				@if(strpos($monanslide->hinhAnhMonAn, 'http') !== false)
				<img width="345" height="345" src="{{$monanslide->hinhAnhMonAn}}"  />
				@else
				<img src="storage/app/upload/monan/{{$monanslide->hinhAnhMonAn}}" width="100px" height="100px">
				@endif
			</a>

			<div class="article-wrap">
				<div class="article-category"><i class="fa fa-cutlery" aria-hidden="true"></i> <a href="#">{{$monanslide->tenMonAn}}</a>                 </div><!-- end .article-category -->
			</div><!-- end .article-wrap -->
			<div class="clear"></div>
			<div class="content">
				<a href="#"><h3 class="max-lines">{!!$monanslide->moTaMonAn!!}</h3></a>
			</div>
		</div><!-- end .item -->
		@endforeach
	</div><!-- end #featured-slider -->
</div><!-- end #featured-slider-wrap -->
</div>

@endsection