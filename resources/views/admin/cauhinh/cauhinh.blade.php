
@extends('admin.layout.index')
@section('content')
<style type="text/css">
.bat-buoc{
    color: red;
}
</style>
        <div class="content-wrapper" style="min-height: 960px;">
            <div class="container-fluid">
            	<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cấu hình giao diện cho webiste
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
                <form action="{{route('sendcauhinh',$cauhinh->idCauhinh)}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Màu giao diện:<span class="bat-buoc" >(*)</span></label>
                        <input type="color" name="maugiaodien" value="{{$cauhinh->maugiaodien}}" required="true">
                    </div>
                    <div class="form-group">
                        <label>Liên hệ: <span class="bat-buoc" >(*)</span></label>
                        <textarea id="demo" class="ckeditor" name="lienhe">{!!$cauhinh->lienhe!!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ: <span class="bat-buoc" >(*)</span></label>
                        <textarea id="demo" class="ckeditor" name="diachi">{!!$cauhinh->diachi!!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Footer: <span class="bat-buoc" >(*)</span></label>
                        <textarea id="demo" class="ckeditor" name="footer">{!!$cauhinh->footer!!}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label>Chọn upload hình hoặc link cho ảnh logo: </label><br/>
                        @if(strpos($cauhinh->hinhDaiDien, 'http') !== false)
                            <label>Hình ban đầu</label>
                            <img src="{{$cauhinh->hinhDaiDien}}" width="100px" height="100px" >
                            @else                            
                            <label>Hình ban đầu</label>
                            <img src="storage/app/logo/{{$cauhinh->logo}}" width="100px" height="100px" >
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
                            <input type="text" name="logo" id="file1" class="form-control" placeholder="Vui lòng dán link ảnh vào đây..."  accept="image/gif, image/jpeg, image/png" />
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">Cập Nhật Thông Tin</button>
                    <button type="reset" class="btn btn-danger">Xoá tất cả</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
            </div>
        </div>
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