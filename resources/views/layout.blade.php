<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 6</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" >
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" >
  <script href="{{ asset('js/jquery-3.3.1.js')}}"></script>

  <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script> 
</head>
<body>
  @extends('menu')
  <div class="page-content" id="content">
  <div id="loading" class="canvas">
  <div class="lds-ripple"><div></div><div></div></div>
</div>
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Menu</small></button>
    <div  id="cont" class="container" style="display:none"> 
    @yield('content')
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>  

<script>
$(document).ready(function(){
  $("#loading").hide();
  $("#cont").show();
})
</script>
</body>
</html>