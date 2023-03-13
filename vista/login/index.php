<?php
  session_start();

  @$sesion = $_SESSION['correo'];

  if($sesion == null || $sesion == ""){
    echo "<script>alert('NO TIENE ACCESO, INICIE SESION')</script>";
    header("location:../../index.html");
    die();
    
  }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/logofinal.png" /> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Banco AgroBinance</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/bis.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

  </head>

  <body>

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
            </ul>
          </div>
        </div>
      </div>
    </div>
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><img class="logonav" src="../assets/images/llogo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="vista/registro.html">Creditos</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="services.php">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Nosotros</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="perfil.php">Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../controlador/CtrlCerrar.php">Cerrar Sesion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          
          <div class="item item-1">
            <div class="img-fill">
                <div class="text-content">
                  <br><br>
                  <h4>Tú dinero esta seguro <br>con nosotros</h4>
                  <h6>Tú dinero, nuestra responsabilidad.</h6>
                  <p>En los momentos de crisis, solo la creatividad y una mano amiga es más importante que el conocimiento.</p>
                  <a href="vista/contact.html" class="filled-button">Contactanos</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
          <!-- Item -->
        
          <div class="item item-2">
            <div class="img-fill">
                <div class="text-content">
                  <br><br>
                  <h4>Estamos aquí para brindarle la<br> mejor atención al cliente</h4>
                  <p> En nuestra institución financiera, nuestro equipo de expertos en finanzas está a su disposición para brindarle 
                    un servicio excepcional y ayudarle a alcanzar sus metas financieras. </p>
                  <a href="vista/services.html" class="filled-button">Nuestros servicios</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
          <!-- Item -->
        
          <div class="item item-3">
            <div class="img-fill">
                <div class="text-content">
                  <br><br>
                  <h4>Ofrecemos soluciones<br>para tu biniestar</h4>
                  <p>Queremos que se sienta seguro/a y respaldado/a en cada paso del camino, y estamos comprometidos a ofrecerle soluciones 
                    personalizadas que se adapten a su situación personal.</p>
                  <a href="vista/about.html" class="filled-button">Conoce más</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
        </div>
    </div>


    <!-- Banner Ends Here -->

    <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4>Atención al cliente 24/7</h4>
            <span>Nos enorgullece ofrecer un servicio rápido, eficiente y personalizado para satisfacer todas sus necesidades. Por favor, háganos saber cómo podemos ayudarlo y estaremos encantados de asistirlo en lo que sea necesario.</span>
          </div>
          <div class="col-md-4">
            <a href="vista/contact.html" class="border-button">Contáctanos</a>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Servicios <em>Financieros</em></h2>
              <span>Estamos aquí para ser tú amigo.</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <img src="../assets/images/service_01.jpg" alt="">
              <div class="down-content">
                <h4>Vigilancia Digital</h4>
                <p>La vigilancia digital es un componente crítico de la seguridad en un sistema bancario, ya que ayuda a proteger la información del cliente y a garantizar la integridad del sistema.</p>
                <a href="" class="filled-button">Leer más</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <img src="../assets/images/service_03.jpg" alt="">
              <div class="down-content">
                <h4>Historial Economico</h4>
                <p>Se tiene un registro a tiempo real de todas las transacciones, cobros, depositos y retiros de tú cuenta bancaria.</p>
                <a href="" class="filled-button">Leer más</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <img src="../assets/images/service_02.jpg" alt="">
              <div class="down-content">
                <h4>Asesoría financiera</h4>
                <p>Ofrecer asesoría financiera a los clientes, tanto para la adquisición de productos como para el manejo de sus recursos.</p>
                <a href="" class="filled-button">Leer más</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="fun-facts">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="left-content">
              <span>Por qué elegirnos a nosotros?</span>
              <h2>Servicios y asesorias <em>economicas y de negocios PYMES</em></h2>
              <p>El éxito de toda pequeña, mediana o gran empresa depende en gran medida del constante análisis situacional y empleo de estrategias.<br><br> Ante esto vale la pena preguntarse ¿Por qué es importante el asesoramiento en las pymes?

                En el transitar del día a día de una pequeña o mediana empresa, los empresarios muchas veces pierden la visión global de la misma. Esto es consecuencia de que en algunos casos no se cuenta con personal dedicado exclusivamente a atender este elemento estratégico.
              </p>
              <a href="" class="filled-button">Leer más</a>
            </div>
          </div>
          <div class="col-md-6 align-self-center">
            <div class="row">
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">945</div>
                  <div class="count-title">PYMES con asesoria</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">1280</div>
                  <div class="count-title">Clientes satisfechos</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">578</div>
                  <div class="count-title">Asesorias actuales</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">380</div>
                  <div class="count-title">PYMES con exito</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="more-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-6">
                  <div class="left-image">
                    <img src="../assets/images/more-info.jpg" alt="">
                  </div>
                </div>
                <div class="col-md-6 align-self-center">
                  <div class="right-content">
                    <span>Quiénes somos?</span>
                    <h2>Conozca sobre<em> AgroBinance</em></h2>
                    <p>Nuestra misión es apoyar a los agricultores y ganaderos en el desarrollo de sus negocios y en la consecución de sus metas financieras. Contribuyendo al crecimiento y desarrollo del sector agrícola en nuestra región.</p>
                    <a href="#" class="filled-button">Leer más</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="partners">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-partners owl-carousel">
            
              <div class="partner-item">
                  <img src="../assets/images/visa.png" title="1" alt="1">
              </div>
                          
              <div class="partner-item">
                   <img src="../assets/images/master.png" title="3" alt="3">
               </div>
               <div class="partner-item">
                    <img src="../assets/images/american.png" title="2" alt="2">
                </div>
                <div class="partner-item">
                    <img src="../assets/images/discover.png" title="4" alt="4">
                 </div>
                          
                 <div class="partner-item">
                      <img src="../assets/images/maestro.png" title="5" alt="5">
                 </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer-->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
            <h4>Negocios financieros</h4>
            <p>Todos nuestros servicios son respaldados por autoridades legales de la región.</p>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Links usables</h4>
            <ul class="menu-list">
              <li><a href="#">Creditos</a></li>
              <li><a href="#">Tarjetas</a></li>
              <li><a href="#">Servicios</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
                    <h4>Nuestras Redes Sociales</h4>
       <p>Contactanos a  nuestras redes sociales y consulta lo que desees .</p>
                    <ul class="social-icons">
                        <li><a rel="nofollow" href="https://fb.com/templatemo" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright &copy; 2023 Banco AgroBinance.
                        </p>
                </div>
            </div>
        </div>
    </div>
    
   

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>
