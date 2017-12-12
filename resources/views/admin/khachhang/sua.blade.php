@extends('admin.layout.index')
@section('content')
<style type="text/css">
.bat-buoc{
    color: red;
}
</style>
<!-- Page Content -->
<div class="content-wrapper" style="min-height: 960px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng
                    <small>Sửa thông tin khách hàng </small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br/>
                    @endforeach
                </div>
                @endif

                @if(Session::has("thanhcong"))
                <div class="alert alert-success">
                    {{Session::get('thanhcong')}}
                </div>
                @endif
                <?php 
                    $Khachhang= $khachhang[0];
                ?>
                <form action="{{route('sendsuakhachhang')}}" method="POST" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="username" id="username" placeholder="Username khách hàng ..." class="form-control" value="{{$Khachhang->username}}" required="true">
                    <div class="form-group">
                        <label style="display: block;">Họ và tên : <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="hoTen" placeholder="Họ khách hàng ..." class="form-control" required="true" value="{{$Khachhang->hoTen}}">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới (password):</label>
                        <input type="password" name="password" placeholder="Password khách hàng ..." class="form-control" >
                    </div>
                    <div class="form-group">
                        <label style="display: block;">SĐT và CMDD<span class="bat-buoc" >(*)</span></label>
                         <span style="display: inline-block; float: left; margin-top: 7px; margin-right: 2px">+84</span><input type="number" name="sdt" placeholder="Số điện thoại khách hàng ..." class="form-control" min="0" max="99999999999" required="true" style="width: 45%;float: left" value="{{$Khachhang->sdt}}">
                        <input type="number" name="cmnd" min="0" max="999999999" placeholder="Cmnd khách hàng ..." class="form-control" value="{{$Khachhang->cmnd}}" required="true" style="width: 50%;float: right">
                    </div><br/>
                    <div class="form-group">
                        <label>Trạng thái tài khoản :<span class="bat-buoc" >(*)</span> </label>
                        <select name="trangThai" class="form-control">
                            @if($Khachhang->trangThai == 0)
                                <option value="0" selected="true">Sử dụng</option>
                                <option value="1" >Không sử dụng</option>
                            @else
                                <option value="0" >Đang được trình bày</option>
                                <option value="1" selected="true">Không trình bày</option>
                            @endIf
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin</button>
                     <a href="{{route('danhsachkhachhang')}}" type="reset" class="btn btn-danger">Quay về</a>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection
        @section('script')
        <script type="text/javascript">
            var openFile = function(event,name) {
                var input = event.target;

                var reader = new FileReader();
                reader.onload = function(){
                  var dataURL = reader.result;
                  var output = document.getElementById(name);
                  output.src = dataURL;
              };
              reader.readAsDataURL(input.files[0]);
          };
          $("#file1").change(function(e){
            openFile(event,'output1');
        });
    </script>
    @endsection