
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
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý sự kiện
                            <small>Danh Sách Sự Kiện</small>
                        </h1>
                    </div>
                    <section class="content tablereponsive">
                        <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên sự kiện</th>
                                <th>Phần trăm (%) giảm giá</th>
                                <th>Trạng thái</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Hình sự kiện</th>
                                <th>Xoá</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--  -->
                            <?php $stt = 0; ?>
                            @foreach($sukien as $sukien)
                            <?php $stt++; ?>
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$sukien->tenSuKien}}</td>
                                <td>{{$sukien->phanTramGiamGia}} %</td>
                                <td>
                                    @if($sukien->trangThai == 1)
                                        <span class="label label-success">Kích hoạt</span>
                                    @else
                                        <span class="label label-danger">Ẩn </span>
                                    @endIf
                                </td>
                                <td>{{$sukien->thoiGianBatDau}}</td>
                                <td>{{$sukien->thoiGianKetThuc}}</td>
                                <td>
                                    @if(strpos($sukien->hinhDaiDien, 'http') !== false)
                                    <img src="{{$sukien->hinhDaiDien}}" width="100px" height="100px" >
                                    @else
                                    <img src="storage/app/upload/sukien/{{$sukien->hinhDaiDien}}" width="100px" height="100px">
                                    @endif
                                </td>
                                <td><a href="{{route('xoasukien',$sukien->idSuKien)}}"><i class="fa fa-trash-o danger" aria-hidden="true" onClick="javascript:return confirm('Bạn có muốn  xoá sự kiện này không??' );"></i></a></td>
                                    <td><a href="{{route('suasukien',$sukien->idSuKien)}}"><i class="fa fa-pencil-square-o success" aria-hidden="true"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                </div>
                    </section>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection