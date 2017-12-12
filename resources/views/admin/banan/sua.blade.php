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
                    <small>Sửa thông tin bàn ăn</small>
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
                <form action="{{route('sendsuabanan',$banan->maBan)}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên của bàn  :<span class="bat-buoc" >(*)</span></label>
                        <input type="text" name="tenBan" id="tenBan" class="form-control" placeholder="Nhập số lượng bàn ăn..." value="{{$banan->tenBan}}">
                        <div id="inform"></div>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái bàn :<span class="bat-buoc" >(*)</span> </label>
                        <select name="trangThai" class="form-control">
                            @if($banan->trangThai == 1)
                                <option value="1" selected="true">Đang được sử dụng</option>
                                <option value="0" >Chưa được sử dụng</option>
                            @else
                                <option value="1" >Đang được sử dụng</option>
                                <option value="0" selected="true">Chưa được sử dụng</option>
                            @endIf
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">Cập Nhật Thông Tin</button>
                    <a href="{{route('danhsachbanan'
                    )}}" type="reset" class="btn btn-danger">Quay về</a>
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
            $('#tenBan').on('keyup',() =>{
                let value  = $("#tenBan").val();
                if(value != ""){
                    $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                       }
                   });
                    $.post("{{route('sendkiemtrabanan')}}",{tenBan : value} ,data=>{
                        let getData = data.data[0];
                        if(getData != undefined){
                            let html = '<div class="alert alert-danger">Tên bàn đã tồn tại </div>';
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