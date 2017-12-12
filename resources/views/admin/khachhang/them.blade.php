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
                    <small>Thêm thông tin khách hàng mới</small>
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
                <form action="{{route('sendthemkhachhang')}}" method="POST" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tài khoản (username): <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="username" id="username" placeholder="Username khách hàng ..." class="form-control" value="" required="true">
                        <div id="inform">  
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Họ và tên : <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="hoTen" placeholder="Họ khách hàng ..." class="form-control" required="true" >
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu (password): <span class="bat-buoc" >(*)</span></label>
                        <input type="password" name="password" placeholder="Password khách hàng ..." class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label style="display: block;">SĐT và CMDD: <span class="bat-buoc" >(*)</span></label>
                        <input type="number" name="sdt" placeholder="Số điện thoại khách hàng ..." class="form-control" min="0" max="99999999999" required="true" style="width: 48%;float: left">
                        <input type="number" name="cmnd" min="0" max="999999999" placeholder="Cmnd khách hàng ..." class="form-control" required="true" style="width: 50%;float: right">
                    </div><br/><br/>
                    
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
                    $.post("{{route('getusernamekhach')}}",{username : value} ,data=>{
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