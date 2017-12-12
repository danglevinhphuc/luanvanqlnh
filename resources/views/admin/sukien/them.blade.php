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
                    <small>Thêm thông tin sự kiện</small>
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
                <form action="{{route('sendthemsukien')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên sự kiện : <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="tenSuKien"  placeholder="Nhập tên sự kiện ..." class="form-control" value="" required="true">
                    </div>
                    <div class="form-group">
                        <label >Thời gian bắt đầu : <span class="bat-buoc" >(*)</span></label>
                        <input type="date" name="thoiGianBatDau" min="<?php echo date('Y-m-d');?>" class="form-control" required="true" >
                    </div>
                    <div class="form-group">
                        <label >Thời gian kết  thúc : <span class="bat-buoc" >(*)</span></label>
                        <input type="date" name="thoiGianKetThuc" min="<?php echo date('Y-m-d');?>" class="form-control" required="true" >
                    </div>
                    <div>
                        <label >Phần trăm giảm giá (%) : <span class="bat-buoc" >(*)</span></label>
                        <input type="number" name="phanTramGiamGia" min="0" class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label>Mô tả sự kiện: </label>
                        <textarea id="demo" class="ckeditor" name="moTaSuKien"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Chọn upload hình hoặc link cho ảnh đại diện sự kiện: </label><br/>
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
    <meta name="_token" content="{!! csrf_token() !!}" />
    @endsection