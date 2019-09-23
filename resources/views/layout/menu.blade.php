<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta name="_token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>

    <nav class="navbar navbar-expand-md  " style="background-color: #e3f2fd;">
  <!-- Brand -->

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="button"><img src="{{asset('images/button.png')}}" class="img-circle"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    @if(session()->has('name'))
    <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#" role="tab" >Dashboard</a>
  </li>
  <li class="nav-item">
    <form method="post" action="/logout">
      {{ csrf_field() }} 
    <button class="btn btn-success">Logout</button>
  </form>
  </li>
  <li>
 
</ul>

    @else
    <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" >Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-admin" role="tab" >Books Management</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" >Contact</a>
  </li>
  <li>
 
</ul>
@endif
  </div> 
</nav>
@if (session()->has('message'))
<div class="alert alert-danger" role="alert">
   {{session()->get('message') }}
</div>
@endif
@yield('datacontent')
  
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>