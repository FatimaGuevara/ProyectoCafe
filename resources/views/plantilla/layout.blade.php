<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Proyecto Cafe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="/archivoscss/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/archivoscss/css/animate.css">
    
    <link rel="stylesheet" href="/archivoscss/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/archivoscss/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/archivoscss/css/magnific-popup.css">

    <link rel="stylesheet" href="/archivoscss/css/aos.css">

    <link rel="stylesheet" href="/archivoscss/css/ionicons.min.css">

    <link rel="stylesheet" href="/archivoscss/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/archivoscss/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/archivoscss/css/flaticon.css">
    <link rel="stylesheet" href="/archivoscss/css/icomoon.css">
    <link rel="stylesheet" href="/archivoscss/css/style.css">
  </head>
  @yield('Navigation')
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/admin">Proyecto<small>Cafe</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/admin" class="nav-link">Inicio</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              @foreach($categorias as $lista)
              	<a class="dropdown-item" href="{{route ('subpro',$lista->id)}}" >{{$lista->nombre}}</a>
                @endforeach
              </div>
            </li>
           

	          <li class="nav-item"><a href="#" class="nav-link">Eventos</a></li>
	          <li class="nav-item"><a href=" {{ url('contactanos',$categorias)}}" class="nav-link">Contactanos</a></li>
	          <li class="nav-item"><a href="{{url('conocenos',$categorias)}}" class="nav-link">Quienes Somos</a></li>
            <li class="nav-item"><a href="blog.html" class="nav-link">Registrarse</a></li>
            
	          
	        </ul>
	      </div>
		  </div>
	  </nav>

    <!-- END nav -->

    @yield('content')
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(archivoscss/images/0.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span h1 class="subheading">Proyecto Cafe</h1></span>
              <h1 class="mb-4">Bienvenidos</h1>
              <h1 class="mb-4">Sera un placer atenderle</h1>
              <p class="mb-4 mb-md-5">Nos especializamos en brindarte el mejor cafe gurmet en los alrededores de la Universidad de El Salvador.</p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(archivoscss/images/logo.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(archivoscss/images/metodos.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(archivoscss/images/cafe.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
            </div>

          </div>
        </div>
      </div>
    </section>
    
    @endyield


    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Nosotros</h2>
              <p>Espacio donde disfrutaras la mejores bebidas a base de cafè, preparadas con máquina de expresso o de método..</p>
             
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-7 mb-md-7">
            <div class="ftco-footer-widget mb-6">
              <h2 class="ftco-heading-8">Nuestras redes sociales</h2>
              <div class="block-20 mb-2 d-flex">
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-2">
                <li class="ftco-animate"><a href="https://twitter.com/cafe_proyecto"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/proyectocafe/"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/Proyecto_cafe/?fbclid=IwAR3QKgKFPmn1mEewzNXI2Yi-7pfhaUxleq-2NdRKqYVYsjV_TBbj8lpjIVE"><span class="icon-instagram"></span></a></li>
              </ul>
                <div class="text">
                  
                  <div class="meta">
                                      </div>
                </div>
              </div>
             
            </div>
          </div>
          <div class="col-lg-2 col-md-4 mb-4 mb-md-4">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Ofrecemos</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cafe Gourmet</a></li>
                <li><a href="#" class="py-2 d-block">Smothies</a></li>
                <li><a href="#" class="py-2 d-block">Postres</a></li>
                <li><a href="#" class="py-2 d-block">Cafe Helado</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Preguntanos</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Colonia San Luis, Avenida Don Bosco, Edifico 349, local 2. Una cuadra abajo de gasolinera Puma ubicada por salida de derecho de la UES, o cuadra arriba de oficinas administrativas de ANDA.
San Salvador</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">7313-6921</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">proyectocafe.sv@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | plantilla gracias a <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="/archivoscss/js/jquery.min.js"></script>
  <script src="/archivoscss/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/archivoscss/js/popper.min.js"></script>
  <script src="/archivoscss/js/bootstrap.min.js"></script>
  <script src="/archivoscss/js/jquery.easing.1.3.js"></script>
  <script src="/archivoscss/js/jquery.waypoints.min.js"></script>
  <script src="/archivoscss/js/jquery.stellar.min.js"></script>
  <script src="/archivoscss/js/owl.carousel.min.js"></script>
  <script src="/archivoscss/js/jquery.magnific-popup.min.js"></script>
  <script src="/archivoscss/js/aos.js"></script>
  <script src="/archivoscss/js/jquery.animateNumber.min.js"></script>
  <script src="/archivoscss/js/bootstrap-datepicker.js"></script>
  <script src="/archivoscss/js/jquery.timepicker.min.js"></script>
  <script src="/archivoscss/js/scrollax.min.js"></script>
  
  <script src="/archivoscss/js/main.js"></script>
    
    
  </body>
</html>