<html>
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
  <body>
  <li class="nav-item active"><a href="/admin" class="nav-link">Inicio</a></li>
 
    <div class="container">
      <div style="height:50px"></div>
      
      <p class="lead">
      <h3 style="color:white";>Registrar Evento</h3>
      <p style="color:white";>Formulario de evento</p>
      
      
      <hr>

      @if (count($errors) > 0)
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif
       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
       </div>
       @endif


      <div class="col-md-6">
        <form action="{{ asset('/evento/create/') }}" method="post">
          @csrf
          <div class="fomr-group">
            <label style="color:white">Nombre del evento</label>
            <input type="text" class="form-control" name="nombre">
          </div>
          <div class="fomr-group">
            <label style="color:white">Descripcion del Evento</label>
            <input type="text" class="form-control" name="descripcion">
          </div>
          <div class="fomr-group">
            <label style="color:white">Fecha</label>
            <input type="date" class="form-control" name="fecha">
          </div>
          <br>
          <div class="fomr-group">
            <label style="color:white">Hora de inicio</label>
            <input type="time" class="form-control" name="hora_inicio" step="3600">
          </div>
          <br>
          <div class="fomr-group">
            <label style="color:white">Hora de finalización </label>
            <input type="time" class="form-control" name="hora_fin" step="3600">
          </div>
          <br>
          <input type="submit" class="btn btn-info" value="Guardar">
        </form>
      </div>

    </div> <!-- /container -->
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