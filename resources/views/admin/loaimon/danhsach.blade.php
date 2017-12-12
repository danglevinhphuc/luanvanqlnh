
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
        <div  class="content-wrapper" style="min-height: 960px;">
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
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý loại món ăn & uống
                            <small>Danh Sách Loại Món Ăn & Uống</small>
                        </h1>
                    </div>
                    
                   <section class="content tablereponsive">
                        <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Loại</th>
                                <th style="width: 100px;">Xem Tất Cả Món Trong Loại Món</th>
                                <th>Xoá</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--  -->
                            <?php $stt = 0; ?>
                            @foreach($loaimon as $loaimon)
                            <?php $stt++; ?>
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$loaimon->loaiMon}}</td>
                                <td>{{$loaimon->trangThai}}</td>
                                <td><a href="{{route('monantheodanhmuc',$loaimon->loaiMonKhongDau)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                <td><a href="{{route('xoaloaimon',$loaimon->idLoaiMon)}}"><i class="fa fa-trash-o danger" aria-hidden="true" onClick="javascript:return confirm('Bạn có muốn  xoá thông tin loại món này không??' );"></i></a></td>
                                    <td><a href="{{route('sualoaimon',$loaimon->idLoaiMon)}}"><i class="fa fa-pencil-square-o success" aria-hidden="true"></i></a></td>
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