<header> 
		<div class="main-header">
			<!-- Logo -->  
      @if(strpos($logo, 'http') !== false)
			<a href="{{route('trangchuclient')}}"><img class="logo" src='{{$logo}}'  alt="Food"></a>
      @else
      <a href="{{route('trangchuclient')}}"><img class="logo" src='storage/app/logo/{{$logo}}'  alt="Food"></a>
      @endif
			<!-- search form get_search_form(); -->
			<form id="searchform2" class="header-search" method="get" action="tim-mon-an" autocomplete="off">
				<div class="triangle-search"></div>
				<input placeholder="Tìm món ăn ..." type="text" name="tim" id="s" autocomplete="off">
        <ul id="dwls_search_results" class="search_results dwls_search_results" style="left: 996.563px; top: 99px; display: block;">
          
        </ul>
				<input type="submit" value="" class="buttonicon">
			</form>
			<ul class="top-list">
				<li><a href="{{route('xemsukien')}}"><i class="fa fa-clock-o"></i> <div>Sự kiện</div></a></li>

				<li><a href="{{route('showbanan')}}"><i class="fa fa-trophy"></i> <div>Bàn ăn</div></a></li>

			</ul><!-- end .top-list -->
			<div class="clear"></div>
		</div><!-- end .main-header -->
		
		@include("client.layout.menu")
		<!-- Footer Theme output -->
<script>jQuery(document).ready(function(){jQuery(".thumbs-rating-container").each(function(b){var a=jQuery(this).data("content-id");var c="thumbsrating"+a;if(localStorage.getItem(c)){if(localStorage.getItem("thumbsrating"+a+"-1")){jQuery(this).find(".thumbs-rating-up").addClass("thumbs-rating-voted")}if(localStorage.getItem("thumbsrating"+a+"-0")){jQuery(this).find(".thumbs-rating-down").addClass("thumbs-rating-voted")}}})});</script>
<button id="responsive-menu-button"
class="responsive-menu-button responsive-menu-accessible responsive-menu-boring"
type="button"
aria-label="Menu"><span class="responsive-menu-box"><span class="responsive-menu-inner"></span></span></button>
<div id="responsive-menu-container" class="
slide-left  " >
<div id="responsive-menu-wrapper" >
  <div id="responsive-menu-title">Food Menu</div><ul id="responsive-menu" class=""><li id="responsive-menu-item-143" class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-64 current_page_item responsive-menu-item responsive-menu-current-item"><a href="{{route('trangchuclient')}}" class="responsive-menu-item-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
    <li class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-64 current_page_item responsive-menu-item responsive-menu-current-item"><a href="#" class="responsive-menu-item-link"><i class="fa fa-list" aria-hidden="true"></i>Danh mục loại món</a></li>

    @foreach($loaimonan as $loaimonan)
    <li class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-64 current_page_item responsive-menu-item responsive-menu-current-item"><a href="{{route('monantheodanhmuc',$loaimonan->loaiMonKhongDau)}}" >{{$loaimonan->loaiMon}}</a></li>
    @endforeach
    <li class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-64 current_page_item responsive-menu-item responsive-menu-current-item"><a href="#" class="responsive-menu-item-link"><i class="fa fa-clock-o"></i>Sự kiện</a></li>

        <li class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-64 current_page_item responsive-menu-item responsive-menu-current-item"><a href="{{route('showbanan')}}" class="responsive-menu-item-link"><i class="fa fa-trophy"></i> Bàn ăn</a></li>
  </ul>  

</div>  
  <script type="text/javascript">
  	$(document).ready(function(){
  		let boolButton = false;
  		$("#responsive-menu-button").on('click',()=>{
  			let Width = $(window).height();
  			console.log(Width);
  			if(!boolButton){
  				$("#responsive-menu-button").addClass('is-active');	
  				boolButton = true;

  				$("#responsive-menu-container").css({'margin-left':"75%", "transition": "margin-left 0.3s ease 0s"});
  			}else{
  				$("#responsive-menu-button").removeClass('is-active');	
  				boolButton = false;
  				$("#responsive-menu-container").css('margin-left','0px');
  			}	
  		});
  	});
  </script>
  <script type="text/javascript">
    // script search
    $(document).ready(()=>{
      // $("#s").keyup(()=>{
      //   let html = "<li class='daves-wordpress-live-search_result post_with_thumb'><img src='http://anthemes.com/themes/foot/style1/wp-content/uploads/2015/02/8-150x150.jpg' class='post_thumb'><a href='http://anthemes.com/themes/foot/style1/galaxy-merger-caught-in-stunning-hubble-telescope/' class='daves-wordpress-live-search_title'>Galaxy Merger Caught in Stunning Hubble Telescope</a><div class='clearfix'></div></li>";
      //   $("#dwls_search_results").html(html);
      // });
    });
  </script>
		</header>		