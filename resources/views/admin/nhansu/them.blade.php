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
                <h1 class="page-header">Nhân viên
                    <small>Thêm thông tin nhân viên mới</small>
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
                <form action="{{route('sendthemnhansu')}}" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tài khoản (username): <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="username" id="username" placeholder="Username nhân viên ..." class="form-control" value="" required="true">
                        <div id="inform">  
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Họ và tên : <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="ho" placeholder="Họ nhân viên ..." class="form-control" required="true" style="width: 48%;float: left">
                        <input type="text" name="ten" placeholder="Tên nhân viên ..." class="form-control" required="true" style="width: 50%;float: right;">
                    </div><br/><br/>
                    <div class="form-group">
                        <label>Mật khẩu (password): <span class="bat-buoc" >(*)</span></label>
                        <input type="password" name="password" placeholder="Password nhân viên ..." class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh:</label>
                        <input type="date" name="ngaySinh" class="form-control" max="<?php echo date('Y-m-d');?>">
                    </div>
                    <div class="form-group">
                        <label>Giới tính :</label>
                        Nam :<input type="radio" name="gioiTinh" value="nam" checked="true"> 
                        Nữ :<input type="radio" name="gioiTinh" value="nu" >
                    </div>
                    <div class="form-group">
                        <label style="display: block;">SĐT và CMDD<span class="bat-buoc" >(*)</span></label>
                        <input type="number" name="sdt" placeholder="Số điện thoại nhân viên ..." class="form-control" min="0" max="99999999999" required="true" style="width: 48%;float: left">
                        <input type="number" name="cmnd" min="0" max="99999999999" placeholder="Cmnd nhân viên ..." class="form-control" required="true" style="width: 50%;float: right">
                    </div><br/><br/>
                    <div class="form-group">
                        <label>Địa chỉ : </label>
                        <input type="text" name="diaChi" placeholder="Địa chỉ nhân viên ..." class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Mức lương : <span class="bat-buoc" >(*)</span></label></label>
                        <input type="number" name="luong" placeholder="Mức lương nhân viên ..." class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Chọn upload hình hoặc link cho ảnh đại diện nhân viên: </label><br/>
                        Upload :<input type="radio" name="hinh" class="radioCheck" value="1" checked="true">
                        Link : <input type="radio" name="hinh" class="radioCheck" value="0">
                        <div id="upload">
                            <input type="file" name="file" id="file1" class="form-control"  accept="image/gif, image/jpeg, image/png" />
                            <div class="khung_load">
                            <img id='output1' width="100px" height="100px">
                        </div>
                        </div>
                        <div id="link" >
                            <input type="text" name="hinhDaiDien" id="file1" class="form-control"  placeholder="Vui lòng dán link ảnh vào đây..." accept="image/gif, image/jpeg, image/png" />
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Thêm Thông Tin</button>
                    <button type="reset" class="btn btn-danger">Xoá tất cả</button>
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
            $(document).ready(() =>{
                $("#link").css("display","none");
                $('input[name=hinh]').change(() =>{
                    var data =$('input[name=hinh]:checked').val();
                    if(data== 1){
                        $("#upload").show();
                        $("#link").hide();
                    }else{
                        $("#upload").hide();
                        $("#link").show();
                    }
                }); 
            });
        </script>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#username').on('keyup',() =>{
                let value  = $("#username").val();
                if(value != ""){
                    $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                       }
                   });
                    $.post("{{route('getusername')}}",{username : value} ,data=>{
                        let getData = data.data[0];
                        if(getData != undefined){
                            let html = '<div class="alert alert-danger">Tài khoản đã sử dụng </div>';
                            $("#inform").html(html);
                        }else{
                            let html = '<div class="alert alert-success">Bạn có thể sử dụng tài khoản này</div>';
                            $("#inform").html(html);
                        }
                    });
                }else{
                    let html = '<div class="alert alert-danger">Không được để trống </div>';
                            $("#inform").html(html);
                }
            });
            
        });
    </script>
    <meta name="_token" content="{!! csrf_token() !!}" />
    @endsection