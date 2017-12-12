@extends('admin.layout.index')
@section('content')
<style type="text/css">
.bat-buoc{
    color: red;
}
</style>
<!-- Page Content -->
<div class="content-wrapper" style="min-height: 960px;">
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
                    <section class="content-header">
      <h1>
        Nhân sự
        <small>Sửa thông tin nhân sự</small>
    </h1>
</section>
<?php $nhanVien = $nhanvien[0]; ?>
<section class="content">
                    <form action="{{route('suanhansu')}}" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <input type="hidden" name="username" id="username" placeholder="Username nhân viên ..." class="form-control" value="{{$nhanVien->username}}" required="true">
                        <div id="inform"></div>
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Họ và tên : <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="ho" value="{{$nhanVien->ho}}" placeholder="Họ nhân viên ..." class="form-control" required="true" style="width: 48%;float: left">
                        <input type="text" name="ten" placeholder="Tên nhân viên ..." class="form-control" required="true" value="{{$nhanVien->ten}}" style="width: 50%;float: right;">
                    </div><br/><br/>
                    <div class="form-group">
                        <label>Mật khẩu mới (password): <span class="bat-buoc" >(*)</span></label>
                        <input type="password" name="password" placeholder="Password nhân viên ..." class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh:</label>
                        <input type="date" name="ngaySinh" class="form-control" value="{{$nhanVien->ngaySinh}}" >
                    </div>
                    <div class="form-group">
                        <label>Giới tính :</label>
                        @if($nhanVien->gioiTinh == "nam")
                        Nam :<input type="radio" name="gioiTinh" value="nam" checked> 
                        Nữ :<input type="radio" name="gioiTinh" value="nu" >
                        @else
                        Nam :<input type="radio" name="gioiTinh" value="nam"> 
                        Nữ :<input type="radio" name="gioiTinh" value="nu" checked>
                        @endif
                    </div>
                    <div class="form-group">
                        <label style="display: block;">SĐT và CMDD<span class="bat-buoc" >(*)</span></label>
                        <span style="display: inline-block; float: left; margin-top: 7px; margin-right: 2px">+84</span><input type="number" name="sdt" placeholder="Số điện thoại nhân viên ..." class="form-control" value="{{$nhanVien->sdt}}" required="true" style="width: 45%;float: left">
                        <input type="number" name="cmnd" placeholder="Cmnd nhân viên ..." class="form-control" required="true" value="{{$nhanVien->cmnd}}" style="width: 50%;float: right">
                    </div><br/><br/>
                    <div class="form-group">
                        <label>Địa chỉ : </label>
                        <input type="text" name="diaChi"  value="{{$nhanVien->diaChi}}" placeholder="Địa chỉ nhân viên ..." class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Mức lương : <span class="bat-buoc" >(*)</span></label></label>
                        <input type="number" name="luong" value="{{$nhanVien->luong}}" placeholder="Mức lương nhân viên ..." class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái tài khoản :<span class="bat-buoc" >(*)</span> </label>
                        <select name="trangThai" class="form-control">
                            @if($nhanVien->trangThai == 0)
                                <option value="0" selected="true">Sử dụng</option>
                                <option value="1" >Không sử dụng</option>
                            @else
                                <option value="0" >Đang được trình bày</option>
                                <option value="1" selected="true">Không trình bày</option>
                            @endIf
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn upload hình hoặc link cho ảnh đại diện món ăn: </label><br/>
                        @if(strpos($nhanVien->hinhDaiDien, 'http') !== false)
                            <label>Hình ban đầu</label>
                            <img src="{{$nhanVien->hinhDaiDien}}" width="100px" height="100px" >
                            @else                            
                            <label>Hình ban đầu</label>
                            <img src="storage/app/upload/nhanvien/{{$nhanVien->hinhDaiDien}}" width="100px" height="100px" >
                        @endif<br/>
                        Upload :<input type="radio" name="hinh" class="radioCheck" value="1" checked="true">
                        Link : <input type="radio" name="hinh" class="radioCheck" value="0"><br/>
                        <div id="upload">
                            <input type="file" name="file" id="file1" class="form-control"  accept="image/gif, image/jpeg, image/png" />
                            <div class="khung_load">
                            <img id='output1' width="100px" height="100px">
                        </div>
                        </div>
                        <div id="link" >
                            <input type="text" name="hinhDaiDien" id="file1" class="form-control" placeholder="Vui lòng dán link ảnh vào đây..."  accept="image/gif, image/jpeg, image/png" />
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin</button>
                    <a href="{{route('danhsachnhansu')}}" type="reset" class="btn btn-danger">Quay về</a>
                    </form>
</section>
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
    @endsection