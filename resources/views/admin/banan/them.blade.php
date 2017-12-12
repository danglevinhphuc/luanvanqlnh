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
                <h1 class="page-header">Bàn ăn
                    <small>Thêm thông tin bàn ăn</small>
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
                <form action="{{route('sendthembanan')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Số lượng bàn ăn cần tạo :<span class="bat-buoc" >(*)</span></label>
                        <input type="number" name="soluong" min="0" class="form-control" placeholder="Nhập số lượng bàn ăn..." required="true">
                    </div>
                    <div class="form-group">
                        <label>Tên cho bàn (vd: ban => ban1, ban2) :<span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="tenBan" id="tenBan" class="form-control" placeholder="Nhập số lượng bàn ăn..." value="">
                        <div id="checkTenBan"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">Thêm Thông Tin</button>
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
            $(document).ready(()=>{
                $("#submit").attr("disabled", true);
                $("#tenBan").on('keyup',()=>{
                    // kiem tra ten ban bat dau la so
                    let data = $("#tenBan").val();// lay gia tri value tu input 
                    if(data != ""){
                        if(data[0] != undefined){// kiem tra du lieu co ton tai khong
                            var patt = /[A-Za-z]/;
                            if (patt.test(data[0])) {
                                let html = '<div class="alert alert-success">Tên bàn hợp lệ </div>';
                                $("#checkTenBan").html(html);
                                $("#submit").removeAttr( "disabled" );
                            }else{
                                let html = '<div class="alert alert-danger">Ký tự bắt đầu phải là chữ và không dấu (vd:abcd) </div>';
                                $("#checkTenBan").html(html);
                                $("#submit").attr("disabled", true);
                            }
                        }
                    }else{
                        let html = '<div class="alert alert-danger">Không được để trống </div>';
                        $("#checkTenBan").html(html);
                        $("#submit").attr("disabled", true);
                    }
                });
            });
        </script>
        @endsection