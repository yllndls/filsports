<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="../user/img/fsp.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('user/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin-css/style.css')}}">
    <link rel="shortcut icon" type="image" href="./img/png-tr2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="../js/app.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Filsports Printing Studio</title>
</head>
<body>

<!-- fixed-top aqua -->
<div class="home-section">
<nav class="navbar-fixed-top navbar-expand-sm">
  <div class="navbar-collapse collapse" id="navbar1">
      <ul class="navbar-nav">
          <li class="nav-item ms-5 me-lg-0">
              <a class="nav-text" href=""><i class="fa fa-phone fa-lg"></i>CALL US! +63 991-314-6785</a>
          </li>
          <li class="nav-item ms-5 me-lg-0">
              <a class="nav-text" href=""><i class="fa fa-envelope fa-lg"></i>FILSPORTSHOP.TAILORING@GMAIL.COM</a>
          </li>
          <li class="nav-item ms-5 me-lg-0">
            <a class="nav-text"><i class="fa fa-facebook fa-lg"></i>FILSPORTS TAILORING SHOP</a>
          </li>
      </ul>
  </div>
</nav>

<!-- fixed-top black -->
<div class="fixed-top">
  <nav class="navbar navbar-expand-sm py-0">
      <div class="navbar-collapse collapse" id="navbar2">
        <a class="navbar-brand" href="{{ url('/home') }}" id="logo"><img src="../user/img/fsp.png" style="width:38px;height:38px; margin-left: 30px; margin-top: -3px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <a class="navbar-brand" href="/home" style="font-size: 22px; color:aliceblue; margin-left: -20px; margin-top: 8px">FILSPORTS PRINTING STUDIO</a>
            <li class="nav-item ms-5 me-lg-0">
              <a class="nav-link active" aria-current="page" href="{{  url('/home') }}" id="first-child" style="color:aliceblue; font-size: 18px; margin-left: 20rem">HOME</a>
            </li>
            <li class="nav-item me-lg-0">
              <a class="nav-link" href=" {{  url('/user/services') }}" style="color:aliceblue; font-size: 18px">SERVICES</a>
            </li>
            <li class="nav-item me-lg-0">
              <a class="nav-link" href="{{ url('/user/sports') }}" style="color:aliceblue; font-size: 18px">SPORTS</a>
            </li>
            <li class="nav-item me-lg-0">
              <a class="nav-link" href="{{ url('/user/about') }}" style="color:aliceblue; font-size: 18px">ABOUT US</a>
            </li>
          </ul>

          
          <!-- Logout icon -->
              @csrf
              @method('DELETE')
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle second-text fw-bold" href="" id="navbarDropdown"
                          role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-person-circle h3"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <li><h3 class="dashboard"></h3></li>
                          <li><a class="dropdown-item" href="{{route('user.order')}}">Dashboard</a></li>
                          <li><h3 class="logout"></h3></li>
                          <li><a class="dropdown-item" href="{{ url('/')}}">Logout</a></li>
                      </ul>
                  </li>
              </ul>
            </div>
  </nav>
</div>

      <!--home start-->
        @yield('content')
      <!--home end-->
    </div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
	const images = document.querySelectorAll("img");
	images.forEach(image => {
		image.addEventListener("mouseenter",
			function () {
				this.style.transform = "scale(1.1) translateY(-15px)";
				this.style.boxShadow = "5px 20px 30px rgba(0, 0, 0, 0.2)";
			});
		image.addEventListener("mouseleave",
			function () {
				this.style.transform = "scale(1) translateY(0)";
				this.style.boxShadow = "none";
			});
	});
});
</script>

<div class="d-none d-md-block"><!-- Hidden on mobile --></div>
<div class="d-md-none"><!-- Visible only on mobile --></div>
</body>
</html>
