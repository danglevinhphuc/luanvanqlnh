<div id="wrapper">

        @include("client.banan.header")

        @yield('content')
        @include("client.banan.footer")
    </div>
    <script type="text/javascript">
    	      $(document).ready(function(){
      			var socketTatThietBi = io.connect("http://localhost:3000/");
          		socketTatThietBi.on("turn off device from server",function(data){
          		if(data){
              		// xoa localStorage
              		localStorage.removeItem("maban");
              		localStorage.removeItem("soluongchuahoanthanh");
              		localStorage.removeItem("soluonghoanthanh");
              		localStorage.removeItem("tenMonAn");
              		localStorage.removeItem("tenban");
                  window.location.href="{{route('showbanan')}}";
            	}
          });
      });
    </script>