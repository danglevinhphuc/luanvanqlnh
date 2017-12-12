<?php
  $giaodien = session('giaodien');
?>
<aside class="main-sidebar" style="position: fixed;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="" class="img-circle" alt="">
      </div>
      <div class="pull-left info">
        <a href="{{route('trangchuadmin')}}"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header" style="color: #fff;font-size: 20px;">DANH MỤC CHỨC NĂNG</li>
      <?php if($giaodien == 2){ ?>
      <li class="treeview" id="trangchu">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Thống kê</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('trangchuadmin')}}"><i class="fa fa-circle-o"></i> Thống kê chi tiết</a></li>
          </ul>
        </li>
      <li class="treeview " id="nhansu">
        <a href="#">
          <i class="fa fa-users"></i> <span>Quản lý nhân sự</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="danhsach">
            <a href="{{route('danhsachnhansu')}}"><i class="fa fa-circle-o"></i> Danh sách nhân sự</a>
          </li>
          <li class="them" name="them">
            <a href="{{route('themnhansu')}}"><i class="fa fa-circle-o"></i> Thêm thông tin nhân viên</a>
          </li>
        </ul>
      </li>
      <li class="treeview" id="khachhang">
        <a href="#">
          <i class="fa fa-users" ></i> <span>Quản lý khách hàng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="danhsach">
            <a href="{{route('danhsachkhachhang')}}"><i class="fa fa-circle-o"></i> Danh sách khách hàng</a>
          </li>
          <li class="them">
            <a href="{{route('themkhachhang')}}"><i class="fa fa-circle-o"></i> Thêm thông tin khách hàng</a>
          </li>
        </ul>
      </li>
      <li class="treeview" id="loaimon">
        <a href="#">
          <i class="fa fa-list-ol" ></i> <span> Quản lý loại món ăn & uống</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" id="loaimon">
         <li class="danhsach">
          <a href="{{route('danhsachloaimon')}}"><i class="fa fa-circle-o"></i> Danh sách loại món <br/>ăn  & uống</a>
        </li>
        <li class="them">
          <a href="{{route('themloaimon')}}"><i class="fa fa-circle-o"></i> Thêm thông tin loại món <br/> ăn & uống</a>
        </li>
      </ul>
    </li>
    <li class="treeview" id="thucdon">
      <a href="#">
        <i class="fa fa-list-ol" ></i> <span> Quản lý món trong thực đơn</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="danhsach">
          <a href="{{route('danhsachthucdon')}}"><i class="fa fa-circle-o"></i> Danh sách món<br/> ăn & uống trong thực đơn</a>
        </li>
        <li class="them">
          <a href="{{route('themthucdon')}}"><i class="fa fa-circle-o"></i> Thêm thông tin món<br/> ăn & uống trong thực đơn</a>
        </li>
      </ul>
    </li>
    <li class="treeview" id="banan">
      <a href="#">
        <i class="fa fa-table" ></i> <span> Quản lý bàn ăn</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
       <li class="danhsach">
        <a href="{{route('danhsachbanan')}}"><i class="fa fa-circle-o"></i> Danh sách bàn ăn</a>
      </li>
      <li class="them">
        <a href="{{route('thembanan')}}"><i class="fa fa-circle-o"></i> Thêm thông tin bàn ăn</a>
      </li>
    </ul>
  </li>
  <li class="treeview" id="sukien">
    <a href="#">
      <i class="fa fa-birthday-cake" ></i> <span> Quản lý sự kiện</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
     <li class="danhsach">
      <a href="{{route('danhsachsukien')}}"><i class="fa fa-circle-o"></i> Danh sách sự kiện</a>
    </li>
    <li class="them">
      <a href="{{route('themsukien')}}"><i class="fa fa-circle-o"></i> Thêm thông tin sự kiện</a>
    </li>
  </ul>
</li>
<li class="treeview" id="cauhinh">
    <a href="#">
      <i class="fa fa-wrench" aria-hidden="true"></i> <span> Cấu hình chung</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
    <li class="cauhinh">
      <a href="{{route('cauhinh')}}"><i class="fa fa-circle-o"></i> Cấu hình cho trang chủ</a>
    </li>
    <li >
      <a style="cursor: pointer;" data-toggle="modal" data-target="#TatThietBi"><i class="fa fa-circle-o"></i> Tắt thiết bị</a>
    </li>
  </ul>
</li>
<?php }?>
  <li class="treeview" id="congviec">
    <a href="#">
      <i class="fa fa-briefcase" aria-hidden="true"></i> <span>Công việc</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <?php if($giaodien == 1 || $giaodien == 2){ ?>
     <li class="daubep">
      <a href="{{route('daubep')}}"><i class="fa fa-circle-o"></i> Đầu bếp</a>
    </li>
    <?php } ?>
    <?php if($giaodien == 0 || $giaodien == 2 || $giaodien == 1){ ?>
    <li class="phucvu">
      <a href="{{route('phucvu')}}"><i class="fa fa-circle-o"></i> Phục vụ</a>
    </li>
    <?php } ?>
    <?php if($giaodien == 2){ ?>
    <li class="thanhtoan">
      <a href="{{route('thanhtoan')}}"><i class="fa fa-circle-o"></i> Thanh toán</a>
    </li>
    <?php } ?>
  </ul>
</li>
</section>
<!-- /.sidebar -->
</aside>
<style type="text/css">
.bg-green{
  display: none;
}
</style>
<div id="TatThietBi" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header btn-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tắt Thiết Bị </h4>
      </div>
      <div class="modal-body">
          <span style="font-size: 25px">Xác nhận tắt thiết bị thì mọi thiết bị gọi món (order) sẽ được tắt và việc kích hoạt lại phải được thực hiện trên các thiết bị bạn có muốn tắt thiết bị không ?</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="dong-y-goi-mon" data-dismiss="modal">Đồng ý</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
@section('script1')
<script type="text/javascript">
  $(document).ready(() =>{
    var dataUrl = ['trangchu','nhansu','khachhang','loaimon','thucdon','banan','sukien','cauhinh','congviec'];
    var activeLi = ['danhsach','them','daubep','phucvu','cauhinh','thanhtoan'];
    var url = $(location).attr('href'); 
    console.log(url);
    for(let i = 0 ; i < dataUrl.length ; i++){
      if(url.indexOf(dataUrl[i]) != -1){
        $('#'+dataUrl[i]).addClass('active');
        for(let j = 0 ; j  < activeLi.length ;j++){
          if(url.indexOf(activeLi[j])  != -1){
            console.log("ok");
            $('.'+activeLi[j]).addClass('active');
            break;
          } 
        }
        break;
      }
    }
  });
</script>
<script type="text/javascript">
  /**TAT THIET BI GOI MON **/
  $(document).ready(function(){
    var socketTatThietBi = io.connect("http://localhost:3000/");
    var turnOff= 1;
    $("#dong-y-goi-mon").on('click',function(){
      socketTatThietBi.emit("turn off device from client",turnOff);
      /** Nhan du lieu tat thiet bi tu server de tat thiet bi va xoa localStoragte*/
      socketTatThietBi.on("turn off device from server",function(data){
        if(data){
          // xoa localStorage
          localStorage.removeItem("maban");
          localStorage.removeItem("soluongchuahoanthanh");
          localStorage.removeItem("soluonghoanthanh");
          localStorage.removeItem("tenMonAn");
          localStorage.removeItem("tenban");
        }
      });
    });
  });
</script>
@endsection