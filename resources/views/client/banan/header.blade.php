<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>
      @yield('title')
    </title>    
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
    <link rel="shortcut icon" href='{{ asset("public") }}/client/img/logo.png'>
    <link href="{{ asset('public') }}/admin_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('public') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('public') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel='stylesheet' id='ap-front-styles-css'  href='{{ asset("public") }}/bower_components/bootstrap/dist/css/bootstrap.min.css' type='text/css' media='all' />
    @yield('headlink')
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
</head>

<body >

    <div id="wrapper">