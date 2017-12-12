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
                <h1 class="page-header">Món ăn & uống trong thực đơn
                    <small>Sửa thông tin món ăn & uống</small>
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
                <form action="{{route('sendsuamonan',$monan->idMonAn)}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label style="display: block;">Tên và Giá món ăn & uống : <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="tenMonAn" id="loaimon" placeholder="Tên món ăn & uống ..." class="form-control" value="{{$monan->tenMonAn}}" required="true" style="width: 48%;float: left">
                        <input type="number" name="giaMonAn" min="0" value="{{$monan->giaMonAn}}" placeholder="Giá món ăn & uống ..." class="form-control" style="width: 50%;float: right" required="true">
                    </div><br/><br/>
                    <div id="inform"></div>
                    <div class="form-group">
                        <label>Chọn loại món ăn: <span class="bat-buoc" >(*)</span></label>
                        <select class="form-control" name="idLoaiMon" required="true">
                            <option value="">****************************** Chọn loại món ăn & uống *****************************</option>
                            @foreach($loaimon as $loaimon)
                                @if($monan->idLoaiMon == $loaimon->idLoaiMon)

                                <option value="{{$loaimon->idLoaiMon}}" selected="true">{{$loaimon->loaiMon}}</option>
                                @else
                                <option value="{{$loaimon->idLoaiMon}}">{{$loaimon->loaiMon}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả thêm cho món ăn: </label>
                        <textarea id="demo" class="ckeditor" name="moTaMonAn">{{$monan->moTaMonAn}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái món ăn :<span class="bat-buoc" >(*)</span> </label>
                        <select name="trangThai" class="form-control">
                            @if($monan->trangThai == 0)
                                <option value="0" selected="true">Đang được trình bày</option>
                                <option value="1" >Không trình bày</option>
                            @else
                                <option value="0" >Đang được trình bày</option>
                                <option value="1" selected="true">Không trình bày</option>
                            @endIf
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn upload hình hoặc link cho ảnh đại diện món ăn: </label><br/>
                        @if(strpos($monan->hinhAnhMonAn, 'http') !== false)
                            <label>Hình ban đầu</label>
                            <img src="{{$monan->hinhAnhMonAn}}" width="100px" height="100px" >
                            @else                            
                            <label>Hình ban đầu</label>
                            <img src="storage/app/upload/monan/{{$monan->hinhAnhMonAn}}" width="100px" height="100px" >
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
                    <a href="{{route('danhsachthucdon')}}" type="reset" class="btn btn-danger">Quay về</a>
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
            $('#loaimon').on('keyup',() =>{
                let value  = $("#loaimon").val();
                if(value != ""){
                    $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                       }
                   });
                    $.post("{{route('tenmonan')}}",{tenMonAn : value} ,data=>{
                        let getData = data.data[0];
                        if(getData != undefined){
                            let html = '<div class="alert alert-danger">Tên này đã sử dụng </div>';
                            $("#inform").html(html);
                        }else{
                            let html = '<div class="alert alert-success">Bạn có thể sử dụng tên này</div>';
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