<!DOCTYPE html>
<!--
	Awesome Responsive Template
	templatestock.co
-->
<html>
<head>
	<title>@yield('title')</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

	<!-- Goggle Font -->
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

	<!-- Font Css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

	<!-- Animation Css -->
	<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
</head>

<body>

<!-- Header -->
<div class="header-div" style="background-color:{{$front_config['bgcolor']}};">

    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header logo-div bounceInLeft wow" data-wow-duration="1s" style="visibility: visible; animation-name: rollIn;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">{{$front_config['title']}}</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse top-right-menu-ul bounceInRight wow" id="bs-example-navbar-collapse-1" data-wow-duration="2s">
          <ul class="nav navbar-nav navbar-right">

            @foreach($front_menu as $itemSlug => $itemTitle)
                <li><a href="{{$itemSlug}}">{{$itemTitle}}</a></li>
            @endforeach

          </ul>
        </div><!-- End navbar-collapse -->
      </div><!-- End container -->
    </nav>
    
    <div class="container wow bounceInDown" data-wow-duration="4s">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 text-center slide-text">
                <h1>{{$front_config['title']}}</h1>
                <p>{{$front_config['subtitle']}}</p>
            </div><!-- End col-md-8-->
            <div class="col-md-offset-2"></div><!-- End col-md-offset-2 -->
        </div><!-- End Row -->
    </div><!-- End Contanier -->
    
</div>
<!-- End header-div -->



@yield('content')



<!-- Footer -->
<footer>
    <div class="container">
    	<div class="row">
            <div class="col-sm-12 footer-social">
            	<a href="#"><i class="fa fa-facebook"></i></a>
		    	<a href="#"><i class="fa fa-dribbble"></i></span></a>
		        <a href="#"><i class="fa fa-twitter"></i></a>            	
            	<a href="#"><i class="fa fa-instagram"></i></a>
            	<a href="#"><i class="fa fa-google-plus"></i></a>
            	<a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 footer-copyright">
            	© Import Template by <a href="http://templatestock.co">Template Stock</a>.
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<script type="text/javascript" src="{{asset('assets/js/jquery-main.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>

<script>
	new WOW().init();
</script>

</body>
</html>