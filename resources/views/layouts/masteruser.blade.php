<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{--TOKEN PARA CAMBIOS--}}
    <meta name="token" id="token" value="{{ csrf_token() }}">
    {{--META PARA RUTA DINAMICA--}}
    <meta name="route" id="route" value="{{url('/')}}">
    <script src="js/vue.min.js"></script>
    <script src="js/vue.js"></script>
    <script src="js/vue-resource.min.js"></script>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  <title>@yield('titulo')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links"><br>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h4 class="text-light"><a href="" class="scrollto"><span>Bienvenido:  {{Session::get('usuario')}} - {{Session::get('rol')}}</span></a></h4>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><a href="{{url('user')}}"><i class="fa fa-info-circle"></i>   Perfil </a></li>
          <li><a href="{{url('ventas')}}"><i class="fa fa-bell"></i>  Venta</a></li>
<!--           <li><a href="{{url('proveedor')}}"><i class="fa fa-address-book"></i>      Proveedores </a></li>
          <li class="drop-down"><a href=""><i class="fa fa-list-alt"></i>     Especificaciones de los productos</a>
            <ul>
              <li><a href="{{url('categoria')}}"><i class="fa fa-list"></i>   Categorías</a>
              <li><a href="{{url('tipo_articulo')}}"><i class="fa fa-gift"></i>   Tipos</a>
              </li>
            </ul>
          </li> -->
          <li><a href="{{url('salir')}}"><i class="fa fa-sign-out fa-rotate-180"></i> Cerrar sesión </a></li>
        </ul>
      </nav>
      
    </div>
  </header>

  <main id="main">
    <br><br><br><br><br><br>
    <section id="services" class="section-bg">
      @yield('contenido')
    


    </section> 
  </main>

  @stack('scripts')
  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="js/font-awesome.css"></script>
  

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
