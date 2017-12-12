<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login | Nhà hàng Food</title>
  <link rel="shortcut icon" href='{{ asset("public") }}/client/img/logo.png'>


  
  <link rel="stylesheet" href='{{ asset("public") }}/login/css/style.css'>

  
</head>

<body>
  @if(count($errors) > 0)
  <div class="alert alert-danger" style="text-align: center; margin-top: 120px;">
    @foreach($errors->all() as $err)
    {{$err}}<br/>
    @endforeach
  </div>
  @endif

  @if(Session::has("thanhcong"))
  <div class="alert alert-success" style="text-align: center; margin-top: 120px;">
    {{Session::get('thanhcong')}}
  </div>
  @endif
  <div class="login">
    <header class="header">
      <span class="text">LOGIN</span>
      <span class="loader"></span>
    </header>
    <form action="{{route('authenticate')}}" method="POST">   
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input class="input" type="text" name="username" placeholder="Username">
      <input class="input" type="password" name="password" placeholder="Password">
      <button class="btn" type="submit"></button>
    </form>
  </div>
<!--   <form  action="{{route('authenticate')}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" name="">
  </form> -->
  <script src="{{ asset('public') }}/bower_components/jquery/dist/jquery.min.js"></script>

  <script  src='{{ asset("public") }}/login/js/index.js'></script>

</body>
</html>
