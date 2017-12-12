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
                <h1 class="page-header">Sự kiện
                    <small>Sửa thông tin sự kiện</small>
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
                @if(Session::has("thatbai"))
                <div class="alert alert-danger">
                    {{Session::get('thatbai')}}
                </div>
                @endif
                <form action="{{route('sendsuasukien',$sukien->idSuKien)}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên sự kiện : <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="tenSuKien"  placeholder="Nhập tên sự kiện ..." class="form-control"  required="true" value="{{$sukien->tenSuKien}}">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái bàn :<span class="bat-buoc" >(*)</span> </label>
                        <select name="trangThai" class="form-control">
                            @if($sukien->trangThai == 1)
                                <option value="1" selected="true">Đang được sử dụng</option>
                                <option value="0" >Chưa được sử dụng</option>
                            @else
                                <option value="1" >Đang được sử dụng</option>
                                <option value="0" selected="true">Chưa được sử dụng</option>
                            @endIf
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Thời gian bắt đầu : <span class="bat-buoc" >(*)</span></label>
                        <input type="date" name="thoiGianBatDau" min="<?php echo date('Y-m-d');?>" class="form-control"  required="true" value="{{$sukien->thoiGianBatDau}}">
                    </div>
                    <div class="form-group">
                        <label >Thời gian kết  thúc : <span class="bat-buoc" >(*)</span></label>
                        <input type="date" name="thoiGianKetThuc" min="<?php echo date('Y-m-d');?>" class="form-control" required="true" value="{{$sukien->thoiGianKetThuc}}">
                    </div>
                    <div>
                        <label >Phần trăm giảm giá (%) : <span class="bat-buoc" >(*)</span></label>
                        <input type="number" name="phanTramGiamGia" min="0" class="form-control" value="{{$sukien->phanTramGiamGia}}" >
                    </div>
                    <div class="form-group">
                        <label>Mô tả sự kiện: </label>
                        <textarea id="demo" class="ckeditor" name="moTaSuKien">{{$sukien->moTaSuKien}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Chọn upload hình hoặc link cho ảnh đại diện món ăn: </label><br/>
                        @if(strpos($sukien->hinhDaiDien, 'http') !== false)
                            <label>Hình ban đầu</label>
                            <img src="{{$sukien->hinhDaiDien}}" width="100px" height="100px" >
                            @else                            
                            <label>Hình ban đầu</label>
                            <img src="storage/app/upload/sukien/{{$sukien->hinhDaiDien}}" width="100px" height="100px" >
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
                    <a href="{{route('danhsachsukien')}}" type="reset" class="btn btn-danger">Quay về</a>
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
    <meta name="_token" content="{!! csrf_token() !!}" />
    @endsection