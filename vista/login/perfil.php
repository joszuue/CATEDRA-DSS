<?php
  session_start();

  @$sesion = $_SESSION['correo'];

  if($sesion == null || $sesion == ""){
    echo "<script>alert('NO TIENE ACCESO, INICIE SESION')</script>";
    header("location:../../index.html");
    die();
    
  }
  require_once "../../modelo/cuentaAhorro/daoCuentaBanco.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <link rel="icon" type="image/x-icon" href="../assets/images/logofinal.png" /> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Banco AgroBinance</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/perfil.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

  </head>

  <body>
    <!--
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    -->
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
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contactanos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.php">Servicios</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="movimientos_usu.php">Operaciones</a>
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
      <div id="perfil">

        <div class="header">
        </div>

        <div class="avatar">
        </div>
      
        <div class="opperfil">
        </div>

        <?php
          require_once "../../modelo/classUser.php";

          $correo = $_SESSION['correo'];
          $dao = new User();
          $perfiles = $dao->perfil($correo);
          
          //Variables que ayudan a crear una nueva cuenta
          $titular = "";
          $dui = "";

          foreach($perfiles as $perfil){
            $titular = $perfil['Nombres'] . " ". $perfil['Apellidos'];
            $dui = $perfil['DUI'];
        ?>
      
        <div class="tituloperfil">
          <h1><?php echo $perfil['Nombres'] . " ". $perfil['Apellidos'];?></h1>
          <div class="bigbriefing">
            <p>
              <b>Correo: </b><?php echo $perfil['Correo']; ?> <b>|</b>
              <b>Departamento: </b><?php echo $perfil['Departamento']; ?> <b>|</b>
            </p>
          </div>
          <div class="smallbriefing">
            <p>
              <b>Telefono: </b><?php echo $perfil['Telefono']; ?> <b>
              <b>Sueldo: </b><?php echo $perfil['Sueldo']; ?>
            </p>
          </div>
        </div><br />
        <?php
          }
        ?>
      
        <div class="infocandidato">
          <form class="mui-form">
      
            <h1 class="title-2">Cliente de AgroBinance</h1>
      
            <center>
              <div class="expsoftware">
                <?php 
                  
                  
                  $misCuentas = new DaoCuentaBanco(); 
                  $Cuentas = $misCuentas->mostrarCuentas($dui);

                  foreach($Cuentas as $cuenta){
                ?>
                <div class="software 1">
                  <div><center><script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                    <lord-icon
                        src="https://cdn.lordicon.com/gsvbkwao.json"
                        trigger="hover"
                        colors="primary:#242424"
                        style="width:50px;height:50px">
                    </lord-icon>
                  </center></div>
                  
                  <br />
                    <span>
                      <b>N° Cuenta</b>
                      <br>
                      <h6 style="color:black;"><?php echo $cuenta['NumCuenta']  ?></h6>
                      <br>
                      <b>Fondo:</b>
                      <h6 style="color:black;"><?php echo "$". $cuenta['Fondos']  ?></h6>
                    </span>
                  <br />
                  <div class="exp 1">
                  </div><center>
                  </center>
                </div>
                <?php
                  }
                ?>
              </div>
            </center><br /><br>
          </form>
        </div>
      
        <br /><br />
      
      </div>
    </div>


    <!-- Banner Ends Here -->

    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Actividad <em>Financiera</em></h2>
            </div>
          </div>

          <!-- Inicio eliminar cuenta -->

          <?php require_once("../../controlador/validaciones.php");
            $total = validarCantDui($dui);
            if($total > 0){
          ?>

          <div class="col-md-4">
            <div class="service-item">
              <div class="down-content">
                <center><script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                  <lord-icon
                      src="https://cdn.lordicon.com/jmkrnisz.json"
                      trigger="hover"
                      colors="primary:#242424"
                      style="width:250px;height:250px">
                  </lord-icon></center>
                
                <h4>Eliminar Cuenta</h4>
                <p>Selecciona la cuenta a eliminar</p>
                <?php require_once "../../controlador/cuentaAhorro/mostrar.php"; ?>
                <form action="../../controlador/cuentaAhorro/ctrlCuentaBanco.php" method="POST">
                  <div class="dropdown">
                    <select class="btn btn-secondary dropdown-toggle" name="NumCuenta" id="Numcuenta"><?php selectCuenta($dui) ?></select>
                  </div>
                  <br>
                  
                  <input class='btn btn-warning' type='submit' name='accion' onclick="if(confirm('Deseas elimar esta cuenta?')){<input type='text' name='vali' Value='False'> } else{ alert('Operacion Cancelada');" value="Eliminar cuenta">
                </form>

                
                
              </div>
            </div>
          </div>
          <?php } ?>
           <!-- Fin eliminar cuenta -->
          
          <!-- Inicio crear cuenta de ahorro -->

          <div class="col-md-4">
            <div class="service-item">
              <div class="down-content">
                <center><script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                  <lord-icon
                      src="https://cdn.lordicon.com/hbvyhtse.json"
                      trigger="hover"
                      colors="primary:#242424"
                      style="width:250px;height:250px">
                  </lord-icon>

                </center>
                <?php 
                if($total < 3){
                ?>
                <h4>Crear nueva cuenta de ahorro</h4>
                <p>Podas nuevas crear nuevas cuentas a tú gusto.</p>
                <form action="../../controlador/cuentaAhorro/ctrlCuentaBanco.php" method="POST">
                  <input type="hidden" name="titular" Value="<?php   echo $titular; ?>">
                  <input type="hidden" name="dui" Value="<?php   echo $dui; ?>">
                  <input type="submit" name="accion" value="Crear Cuenta de ahorro" class='btn btn-warning'>
                </form>
                <?php
                }else{
                  echo "<h4>Has alcanzado el maximo de 3 cuentas</h4>";
                }
                ?>
              </div>
            </div>
          </div>

          <!-- Fin crear cuenta de ahorro -->

          <!-- Inicio modal eliminar cuenta de ahorro -->
          <div id="modal1" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <form action="">
                    <label for="sender" style="text-align: left;">Seleccionar tarjeta a eliminar</label>
                    <?php require_once "../../controlador/cuentaAhorro/mostrar.php"; ?>
                      <div class="dropdown">
                        <select class="btn btn-secondary dropdown-toggle" name="NumCuenta" id="Numcuenta"><?php selectCuenta($dui) ?></select>
                      </div>
                    <button type="button" id="butoneli" class="btn btn-dark">Eliminar tarjeta</button>
                </form>
              </div>
          </div>
          <!-- Fin modal eliminar cuenta de ahorro -->


          <script>

            // Obtener los botones y los modales
              var boton1 = document.getElementById("boton1");
              //var boton2 = document.getElementById("boton2");
              //var boton3 = document.getElementById("boton3");
              var modal1 = document.getElementById("modal1");
              //var modal2 = document.getElementById("modal2");
              //var modal3 = document.getElementById("modal3");

              // Cuando se haga clic en el botón 1, se muestra el modal 1
              boton1.onclick = function() {
              modal1.style.display = "block";
              }

              // Cuando se haga clic en el botón 2, se muestra el modal 2
              boton2.onclick = function() {
              modal2.style.display = "block";
              }

              // Cuando se haga clic en el botón 3, se muestra el modal 3
              boton3.onclick = function() {
              modal3.style.display = "block";
              }

              // Cuando se haga clic en la "x" del modal 1, se cierra el modal 1
              modal1.querySelector(".close").onclick = function() {
              modal1.style.display = "none";
              }

              // Cuando se haga clic en la "x" del modal 2, se cierra el modal 2
              modal2.querySelector(".close").onclick = function() {
              modal2.style.display = "none";
              }

              // Cuando se haga clic en la "x" del modal 3, se cierra el modal 3
              modal3.querySelector(".close").onclick = function() {
              modal3.style.display = "none";
              }

              // Si el usuario hace clic fuera del modal 1, también se cierra
              window.onclick = function(event) {
              if (event.target == modal1) {
              modal1.style.display = "none";
              }
              }

              // Si el usuario hace clic fuera del modal 2, también se cierra
              window.onclick = function(event) {
              if (event.target == modal2) {
              modal2.style.display = "none";
              }
              }

              // Si el usuario hace clic fuera del modal 3, también se cierra
              window.onclick = function(event) {
              if (event.target == modal3) {
              modal3.style.display = "none";
              }
              }
          </script>
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
