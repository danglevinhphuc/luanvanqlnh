
@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<style type="text/css">
   tr td .fa{
        font-size: 30px !important;
    }
    .danger{
        color: red !important; 
    }
    .success{
        color: green !important;
    }   
</style>
        <div class="content-wrapper" style="min-height: 960px;">
            <div class="container-fluid">
                <div class="row">
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
    <div id="inform">  
            </div>
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý món ăn & uống trong thực đơn
                            <small>Danh Sách Món Ăn & Uống</small>
                        </h1>
                    </div>
                    <section class="content tablereponsive">
                        <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Thuộc loại món ăn & uống</th>
                                <th>Hình đại diện</th>
                                <th>Trạng Thái</th>
                                <th>Chi tiết</th>
                                <th>Xoá</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--  -->
                            <?php $stt = 0; ?>
                            @foreach($monan as $monan)
                            <?php $stt++; ?>
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$monan->tenMonAn}}</td>
                                <td>{{number_format($monan->giaMonAn)}} VNĐ</td>
                                <td>{{$monan->loaimon->loaiMon}}</td>
                                <td>
                                    @if(strpos($monan->hinhAnhMonAn, 'http') !== false)
                                    <img src="{{$monan->hinhAnhMonAn}}" width="100px" height="100px" >
                                    @else
                                    <img src="storage/app/upload/monan/{{$monan->hinhAnhMonAn}}" width="100px" height="100px">
                                    @endif
                                </td>
                                <td>
                                    @if($monan->trangThai == 0)
                                        <span class="label label-success active-ajax" id="{{$monan->idMonAn}}">Kích hoạt</span>
                                    @else
                                        <span class="label label-danger active-ajax" id="{{$monan->idMonAn}}">Ẩn</span>
                                    @endIf
                                </td>
                                <td><a href="{{route('chitietmonan',$monan->tenMonAnKhongDau)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                <td><a href="{{route('xoamonan',$monan->idMonAn)}}"><i class="fa fa-trash-o danger" aria-hidden="true" onClick="javascript:return confirm('Bạn có muốn  xoá thông tin món ăn này không??' );"></i></a></td>
                                    <td><a href="{{route('suamonan',$monan->idMonAn)}}"><i class="fa fa-pencil-square-o success" aria-hidden="true"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </section>
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
        function offInform(){
        setTimeout(function(){ 
            $("#off-inform").remove();
        }, 2000);
    }
     /***thay doi trang thai khi nguoi dung click vao trang thai***/
     $(".active-ajax").on('click',function(){
        var id = $(this).attr('id');// lay id
        var text = $(this).text();// lay gia tri trong text
        if(text == "Kích hoạt"){
            $(this).removeClass("label-success");// xoa class label-success
            $(this).addClass("label-danger");// them class label-danger
            $(this).text("Ẩn");// cap nhat lai noi dung hien
        }else{
            $(this).addClass("label-success");// them class label-success
            $(this).removeClass("label-danger");// Xoa class label-danger
            $(this).text("Kích hoạt");// cap nhat lai noi dung hien
        }
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }
       });
        $.get("admin/thucdon/capnhattrangthaimonan/"+id,function(data){
            if(data){
                let html = '<div class="alert alert-success" id="off-inform">'+data.success+'</div>';// thong bao den nguoi dung
                $("#inform").html(html);
                offInform();// tat inform 
            }
        });
     });
    });
</script>
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection