@extends('admin.layout.index')
@section('content')
<style type="text/css">
.bat-buoc{
    color: red;
}
</style>
<!-- Page Content -->
<div  class="content-wrapper" style="min-height: 960px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại món ăn & uống
                    <small>Thêm thông tin loại món ăn & uống mới</small>
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
                <form action="{{route('sendsualoaimon',$loaimon->idLoaiMon)}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên loại món ăn & uống : <span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="loaiMon" id="loaimon" placeholder="Loại món ăn & uống ..." class="form-control" value="{{$loaimon->loaiMon}}" required="true">
                        <div id="inform">  
                        </div>
                        <?php $trangthai = array('phần','chai','thùng'); ?>
                        <div class="form-group">
                        <label>Hình thức : <span class="bat-buoc" >(*)</span></label>
                        <select name="trangThai" class="form-control" required="true">
                            <option value="">************************************ Chọn hình thức **************************************</option>
                            <?php foreach($trangthai as $trangthai){
                                    if($trangthai == $loaimon->trangThai){
                                        echo '<option value="'.$trangthai.'" selected>'.$trangthai.'</option>';
                                    }else{
                                        echo '<option value="'.$trangthai.'">'.$trangthai.'</option>';
                                    }
                                }
                             ?>
                        </select>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin</button>
                    <a href="{{route('danhsachloaimon')}}" type="reset" class="btn btn-danger">Quay về</a>
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
        $(document).ready(function(){
            $('#loaimon').on('keyup',() =>{
                let value  = $("#loaimon").val();
                if(value != ""){
                    $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                       }
                   });
                    $.post("{{route('tenloaimon')}}",{loaimon : value} ,data=>{
                        let getData = data.data[0];
                        if(getData != undefined){
                            let html = '<div class="alert alert-danger">Tài khoản có thể sử dụng </div>';
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