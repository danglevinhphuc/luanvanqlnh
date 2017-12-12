
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
                    <!-- /.col-lg-12 -->
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
                        <h1 class="page-header">Quản lý bàn ăn
                            <small>Danh Sách Bàn Ăn</small>
                        </h1>
                    </div>
                    
                    <section class="content tablereponsive">
                        <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên bàn</th>
                                <th>Trạng Thái</th>
                                <th>Xoá</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--  -->
                            <?php $stt = 0; ?>
                            @foreach($banan as $banan)
                            <?php $stt++; ?>
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$banan->tenBan}}</td>
                                <td>
                                    @if($banan->trangThai == 1)
                                        <span class="label label-success active-ajax" maban="{{$banan->maBan}}">Kích hoạt</span>
                                    @else
                                        <span class="label label-danger active-ajax" maban="{{$banan->maBan}}">Ẩn</span>
                                    @endIf
                                </td>
                                <td><a href="{{route('xoabanan',$banan->maBan)}}"><i class="fa fa-trash-o danger" aria-hidden="true" onClick="javascript:return confirm('Bạn có muốn  xoá thông tin bàn ăn này không??' );"></i></a></td>
                                    <td><a href="{{route('suabanan',$banan->maBan)}}"><i class="fa fa-pencil-square-o success" aria-hidden="true"></i></a></td>
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
        var maban = $(this).attr('maban');// lay id
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
        $.get("admin/banan/capnhattrangthaibanan/"+maban,function(data){
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