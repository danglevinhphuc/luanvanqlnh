		<div class="bar-header">
			<div class="wrap-center">
				<!-- Navigation Menu -->
				<nav id="myjquerymenu" class="jquerycssmenu">
					<ul><li id="menu-item-143" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-64 current_page_item menu-item-143"><a href="{{route('trangchuclient')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
						@foreach($loaimonan as $loaimonan)
						<li id="menu-item-146" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-146"><a href="{{route('monantheodanhmuc',$loaimonan->loaiMonKhongDau)}}"> {{$loaimonan->loaiMon}}</a></li>
						@endforeach
					</ul>                    </nav>
         
				</div><!-- end .wrap-center -->
			</div>