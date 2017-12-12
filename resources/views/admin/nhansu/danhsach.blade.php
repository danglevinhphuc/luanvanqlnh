
@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<style type="text/css">
tr td .fa{
    font-size: 30px !important;
}
.danger{
    color: red !important; 
}
.success{
    color: green !important;
}   
</style>
<div class="content-wrapper" style="min-height: 960px;">
    <!-- Content Header (Page header) -->
    @if(Session::has("thanhcong"))
    <div class="alert alert-success">
        {{Session::get('thanhcong')}}
    </div>
    @endif
    @if(Session::has("thatbai"))
    <div class="alert alert-danger">
        {{Session::get('thatbai')}}
    </div>
    @endif
    <div id="inform">  
    </div>
    <section class="content-header">
      <h1>
        Quản lý nhân sự
        <small>Danh Sách Nhân Sự</small>
    </h1>
</section>
<!-- /.col-lg-12 -->
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 tablereponsive">
            <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Username</th>
                        <th>Giới tính</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Lương</th>
                        <th>Hình đại diện</th>
                        <th>Trạng Thái</th>
                        <th>Xoá</th>
                        <th>Sửa</th>
                        <th>Quyền</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  -->
                    <?php $stt = 0; ?>
                    @foreach($nhansu as $nhansu)
                    <?php $stt++; ?>
                    <tr>
                        <td>{{$stt}}</td>
                        <td>{{$nhansu->ho}} {{$nhansu->ten}}</td>
                        <td>{{$nhansu->username}}</td>
                        <td>{{$nhansu->gioiTinh}}</td>
                        <td>+84 {{$nhansu->sdt}}</td>
                        <td>{{$nhansu->diaChi}}
                            @foreach($nhansu->phanquyen as $a)
                            {{$a->quanly}}
                            @endforeach
                        </td>
                        <td>{{number_format($nhansu->luong)}} VNĐ</td>
                        <td>
                            @if(strpos($nhansu->hinhDaiDien, 'http') !== false)
                            <img src="{{$nhansu->hinhDaiDien}}" width="100px" height="100px" >
                            @else
                            <img src="storage/app/upload/nhanvien/{{$nhansu->hinhDaiDien}}" width="100px" height="100px">
                            @endif
                        </td>
                        <td >
                            @if($nhansu->trangThai == 0)
                            <span class="label label-success active-ajax" username="{{$nhansu->username}}">Kích hoạt</span>
                            @else
                            <span class="label label-danger active-ajax"  username="{{$nhansu->username}}">Ẩn</span>
                            @endIf
                        </td>
                        <td><a href="{{route('xoanhansu',$nhansu->username)}}"><i class="fa fa-trash-o danger" aria-hidden="true" onClick="javascript:return confirm('Bạn có muốn  xoá thông tin nhân viên này không??' );"></i></a></td>
                        <td><a href="{{route('suanhansu')}}/{{$nhansu->username}}"><i class="fa fa-pencil-square-o success" aria-hidden="true"></i></a></td>
                        <td>
                            <select name="phanquyen" class="form-control phanquyen" ten="{{$nhansu->username}}">
                                @foreach($nhansu->phanquyen as $a)
                                @if($a->quanly == 1)
                                <option value="2">XXXXX</option>
                                <option value="-1" selected="true">Admin</option>
                                <option value="0">Phục Vụ</option>
                                <option value="1">Đầu Bếp</option>
                                @elseif($a->phucvu == 1)
                                <option value="2">XXXXX</option>
                                <option value="-1" >Admin</option>
                                <option value="0" selected="true">Phục Vụ</option>
                                <option value="1">Đầu Bếp</option>
                                @elseif($a->daubep == 1)
                                <option value="2">XXXXX</option>
                                <option value="-1" >Admin</option>
                                <option value="0" >Phục Vụ</option>
                                <option value="1" selected="true">Đầu Bếp</option>
                                @else
                                <option value="2" selected='true'>XXXXX</option>
                                <option value="-1" >Admin</option>
                                <option value="0" >Phục Vụ</option>
                                <option value="1" >Đầu Bếp</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.container-fluid -->

<!-- /#page-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.phanquyen').change(function(){
                let quyen = $(this).val(); // lay quuyen 
                let ten = $(this).attr('ten'); // lay ten ng dung mun cap
                if(quyen != "" && ten != ""){
                    $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                       }
                   });
                    $.post("{{route('capquyen')}}",{quyen : quyen, ten: ten} ,data=>{
                        if(data){
                            let html = '<div class="alert alert-success" id="off-inform">'+data.success+'</div>';
                            $("#inform").html(html);
                            offInform();
                        }
                    });
                }
            });
    });
    function offInform(){
        setTimeout(function(){ 
            $("#off-inform").remove();
        }, 2000);
    }
     /***thay doi trang thai khi nguoi dung click vao trang thai***/
     $(".active-ajax").on('click',function(){
        var username = $(this).attr('username');// lay username
        var text = $(this).text();// lay gia tri trong text
        if(text == "Kích hoạt"){
            $(this).removeClass("label-success");// xoa class label-success
            $(this).addClass("label-danger");// them class label-danger
            $(this).text("Ẩn");// cap nhat lai noi dung hien
        }else{
            $(this).addClass("label-success");// them class label-success
            $(this).removeClass("label-danger");// Xoa class label-danger
            $(this).text("Kích hoạt");// cap nhat lai noi dung hien
        }
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }
       });
        $.get("admin/nhansu/capnhattrangthainhansu/"+username,function(data){
            if(data){
                let html = '<div class="alert alert-success" id="off-inform">'+data.success+'</div>';// thong bao den nguoi dung
                $("#inform").html(html);
                offInform();// tat inform 
            }
        });
    });/***END thay doi trang thai khi nguoi dung click vao trang thai ***/
</script>
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection