<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Admin</title>
    <meta name="description" content=""/>
    <meta name="keywords" content="" />
    <meta name="copyright" content="luanvan" />
    <meta name="author" content="luanvan" />
    <meta name="geo.placename" content="#" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.position" content="10.764396;106.667749" />
    <meta name="ICBM" content="10.764396, 106.667749" />
    <meta name="dc.description" content="">
    <meta name="dc.keywords" content="">
    <meta name="dc.subject" content="">
    <meta name="dc.created" content="2016-11-01">
    <meta name="dc.publisher" content="">
    <meta name="dc.creator.name" content="luanvan">
    <meta name="dc.identifier" content="">
    <meta name="dc.rights.copyright" content="luanvan">
    <meta name="dc.language" content="vi-VN">
    <base href="{{ asset('') }}">
    <link rel="icon" href='{{ asset("public") }}/client/img/logo.png'>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public') }}/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('public') }}/admin_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="{{ asset('public') }}/admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('public') }}/admin_assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('public') }}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('public') }}/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('public') }}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('public') }}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('public') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('public') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('public') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="http://localhost:3000/socket.io/socket.io.js"></script>
  <style type="text/css">
    th{
  text-align: center;
}
.tablereponsive{
  overflow-x:auto;
}
table thead,form{
    font-size: 16px;
    background: #39454f;
    padding: 30px 30px 15px 30px;
    border: 10px solid #e1e1e1;
    box-shadow: 1px 1px 15px #39454f;
    color: #fff;
}
form label{
    color: #CC9900;
}
.active-ajax{
  cursor: pointer;
} 
  </style>


</head>

<body class="hold-transition skin-blue sidebar-mini">
    
    <div id="wrapper">
        
        @include("admin.layout.header")

        @yield('content')

    </div>

    <!-- /#wrapper -->
        <!-- jQuery 3 -->
    <script src="{{ asset('public') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('public') }}/admin_assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('public') }}/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('public') }}/admin_assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('public') }}/admin_assets/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('public') }}/admin_assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public') }}/admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script type="text/javascript" language="javascript" src="{{ asset('public') }}/admin_assets/ckeditor/ckeditor.js" ></script>


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<!-- Morris.js charts -->
<script src="{{ asset('public') }}/bower_components/raphael/raphael.min.js"></script>

<!-- Sparkline -->
<script src="{{ asset('public') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{ asset('public') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('public') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('public') }}/bower_components/moment/min/moment.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('public') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{ asset('public') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('public') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public') }}/dist/js/demo.js"></script>
    @yield('script')
    @yield('script1')
</body>

</html>
